<?php

namespace App\Http\Controllers\Mahasiswa;

use App\FilePeserta;
use App\Kegiatan;
use App\KelompokPrestasi;
use App\Mahasiswa;
use App\Peserta;
use App\Syarat;
use App\Tahapan;
use App\TingkatPrestasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PortofolioController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::where('is_aktif', true)->first();
        $mahasiswa = Auth::user()->mahasiswa;
        $peserta = Peserta::where([
            'kegiatan_id' => $kegiatan->id,
            'is_approved' => 1,
            'mahasiswa_id' => $mahasiswa->id
        ])->first();
        $syarat = Syarat::where('nama_syarat', 'Portofolio')->first();

        $filePesertaPathEnv = config('app.file_peserta_path');
        $filePesertaPath = strtr($filePesertaPathEnv, [
            '{kegiatan_id}' => $kegiatan->id,
            '{peserta_id}' => $peserta->id,
            '{tahapan_id}' => Tahapan::BABAK_PENYISIHAN_1,
        ]);

        $tglSekarang = date('Y-m-d H:i:s');

        return view('mahasiswa.portofolio.index', compact(
            'kegiatan', 'peserta', 'filePesertaPath', 'syarat', 'tglSekarang'));
    }

    public function create()
    {
        $kegiatan = Kegiatan::where('is_aktif', true)->first();

        if ($kegiatan->tgl_akhir_upload < date('Y-m-d H:i:s')) {
            return view('mahasiswa.portofolio.upload_selesai');
        }

        $kelompokPrestasis = KelompokPrestasi::with('jenisPrestasis')->get();
        $tingkatPrestasis = TingkatPrestasi::get();
        return view('mahasiswa.portofolio.create', compact('kelompokPrestasis', 'tingkatPrestasis'));
    }

    protected function makeValidator(Request $request)
    {
        return Validator::make($request->all(), [
            'jenis_prestasi_id' => 'required',
            'file_bukti' => 'file|mimetypes:application/pdf',
            'nama_prestasi' => 'required',
            'tahun' => 'required|numeric',
            'nama_lembaga_event' => 'required',
            'tingkat_prestasi_id' => 'required',
            'jumlah_peserta' => 'nullable|numeric',
            'jumlah_penghargaan_pada_event' => 'nullable|numeric'
        ], [
            'jenis_prestasi_id.required' => 'Pilih Jenis Prestasi',
            'file_bukti.required' => 'File Bukti perlu di unggah',
        ]);
    }

    public function store(Request $request)
    {
        $validator = $this->makeValidator($request);

        if ($validator->fails()) {
            return redirect('mahasiswa/portofolio/create')
                ->withErrors($validator)
                ->withInput();
        }

        // TODO: Logic ini deprecated, perlu di ganti apabila ganti tahun
        /** @var Kegiatan $kegiatan */
        $kegiatan = Kegiatan::where('is_aktif', true)->first();

        /** @var Mahasiswa $mahasiswa */
        $mahasiswa = Auth::user()->mahasiswa;

        /** @var Peserta $peserta */
        $peserta = Peserta::where([
            'kegiatan_id' => $kegiatan->id,
            'is_approved' => 1,
            'mahasiswa_id' => $mahasiswa->id,
        ])->first();

        /** @var Tahapan $tahapan */
        $tahapan = Tahapan::where('nama_tahapan', 'Babak Penyisihan Tahap 1')->first();

        /** @var Syarat $syarat */
        $syarat = Syarat::where('nama_syarat', 'Portofolio')->first();

        // Folder Tujuan
        $destPathConfig = config('app.file_peserta_path');
        $destPath = public_path(
            strtr($destPathConfig, [
                '{kegiatan_id}' => $kegiatan->id,
                '{peserta_id}' => $peserta->id,
                '{tahapan_id}' => $tahapan->id,
            ])
        );

        // Buat foldernya
        if ( ! File::exists($destPath)) {
            // Jika gagal buat folder
            if ( ! File::makeDirectory($destPath, 0777, true)) {
                return "Unable to upload. Make sure {$destPath} is writeable.";
            }
        }

        // File tujuan
        $fileBukti = $request->file('file_bukti');
        $destFile = sha1(time()).'.'.strtolower($fileBukti->getClientOriginalExtension());
        $fileBukti->move($destPath, $destFile);

        // Row file peserta
        $filePeserta = new FilePeserta();
        $filePeserta->peserta_id            = $peserta->id;
        $filePeserta->syarat_id             = $syarat->id;
        $filePeserta->nama_file             = $destFile;
        $filePeserta->nama_asli             = $fileBukti->getClientOriginalName();
        $filePeserta->ukuran                = $fileBukti->getClientSize();
        $filePeserta->jenis_prestasi_id     = $request->input('jenis_prestasi_id');
        $filePeserta->nama_prestasi         = $request->input('nama_prestasi');
        $filePeserta->tahun                 = $request->input('tahun');
        $filePeserta->nama_lembaga_event    = $request->input('nama_lembaga_event');
        $filePeserta->is_kelompok           = $request->input('is_kelompok');
        $filePeserta->tingkat_prestasi_id   = $request->input('tingkat_prestasi_id');
        $filePeserta->jumlah_peserta        = $request->input('jumlah_peserta');
        $filePeserta->jumlah_penghargaan_pada_event = $request->input('jumlah_penghargaan_pada_event');
        $filePeserta->nilai                 = 0;
        $filePeserta->save();

        return redirect('mahasiswa/portofolio/store-success')
            ->with(['message' => 'Portofolio berhasil disimpan']);
    }

    public function storeSuccess()
    {
        return view('mahasiswa.portofolio.store_success');
    }

    public function edit($filePesertaId)
    {
        $kelompokPrestasis = KelompokPrestasi::with('jenisPrestasis')->get();
        $tingkatPrestasis = TingkatPrestasi::get();
        $tahapan = Tahapan::where('nama_tahapan', 'Babak Penyisihan Tahap 1')->first();

        $filePeserta = FilePeserta::find($filePesertaId);
        $destPathConfig = config('app.file_peserta_path');
        $filePeserta->fileUrl = url(
            strtr($destPathConfig, [
                '{kegiatan_id}' => $filePeserta->peserta->kegiatan_id,
                '{peserta_id}' => $filePeserta->peserta_id,
                '{tahapan_id}' => $tahapan->id,
            ])
        ) . '/' . $filePeserta->nama_file;

        return view('mahasiswa.portofolio.edit', compact('kelompokPrestasis', 'tingkatPrestasis', 'filePeserta'));
    }

    public function update(Request $request, $id)
    {
        $validator = $this->makeValidator($request);

        if ($validator->fails()) {
            return redirect(url('mahasiswa/portofolio/'.$id.'/edit'))
                ->withErrors($validator)
                ->withInput();
        }

        /** @var FilePeserta $filePeserta */
        $filePeserta = FilePeserta::find($id);

        /** @var Peserta $peserta */
        $peserta = $filePeserta->peserta;

        /** @var Kegiatan $kegiatan */
        $kegiatan = $filePeserta->peserta->kegiatan;

        /** @var Mahasiswa $mahasiswa */
        $mahasiswa = $filePeserta->peserta->mahasiswa;

        /** @var Tahapan $tahapan */
        $tahapan = Tahapan::where('nama_tahapan', 'Babak Penyisihan Tahap 1')->first();

        // Folder Tujuan
        $destPathConfig = config('app.file_peserta_path');
        $destPath = public_path(
            strtr($destPathConfig, [
                '{kegiatan_id}' => $kegiatan->id,
                '{peserta_id}' => $peserta->id,
                '{tahapan_id}' => $tahapan->id,
            ])
        );

        if ($request->hasFile('file_bukti')) {
            // File tujuan
            $fileBukti = $request->file('file_bukti');
            $destFile = sha1(time()).'.'.strtolower($fileBukti->getClientOriginalExtension());
            $fileBukti->move($destPath, $destFile);

            // Update field
            $filePeserta->nama_file         = $destFile;
            $filePeserta->nama_asli         = $fileBukti->getClientOriginalName();
            $filePeserta->ukuran            = $fileBukti->getClientSize();
        }

        // Update FilePeserta
        $filePeserta->jenis_prestasi_id     = $request->input('jenis_prestasi_id');
        $filePeserta->nama_prestasi         = $request->input('nama_prestasi');
        $filePeserta->tahun                 = $request->input('tahun');
        $filePeserta->nama_lembaga_event    = $request->input('nama_lembaga_event');
        $filePeserta->is_kelompok           = $request->input('is_kelompok');
        $filePeserta->tingkat_prestasi_id   = $request->input('tingkat_prestasi_id');
        $filePeserta->jumlah_peserta        = $request->input('jumlah_peserta');
        $filePeserta->jumlah_penghargaan_pada_event = $request->input('jumlah_penghargaan_pada_event');
        $filePeserta->nilai                 = 0;
        $filePeserta->save();

        return redirect('mahasiswa/portofolio/store-success')
            ->with(['message' => 'Portofolio berhasil disimpan']);
    }

    public function delete($id)
    {
        $filePeserta = FilePeserta::find($id);
        return view('mahasiswa.portofolio.delete', compact('filePeserta'));
    }

    public function destroy($file_peserta_id)
    {

        /** @var FilePeserta $filePeserta */
        $filePeserta = FilePeserta::with(['peserta', 'peserta.kegiatan'])->find($file_peserta_id);

        $destPathConfig = config('app.file_peserta_path');
        $destPath = public_path(
            strtr($destPathConfig, [
                '{kegiatan_id}' => $filePeserta->peserta->kegiatan->id,
                '{peserta_id}' => $filePeserta->peserta->id,
                '{tahapan_id}' => Tahapan::BABAK_PENYISIHAN_1,
            ])
        );

        // Delete Physical File
        $fileDeleted = File::delete($destPath.'/'.$filePeserta->nama_file);

        if ($fileDeleted) {
            // Delete Record
            $filePeserta->delete();
        }

        return view('mahasiswa.portofolio.destroy_success', ['message' => 'Portofolio berhasil dihapus']);
    }

    public function submitFile(Request $request)
    {
        if ($request->method() == 'POST') {

            $kegiatan = Kegiatan::where('is_aktif', true)->first();
            $mahasiswa = Auth::user()->mahasiswa;
            $peserta = Peserta::with(['filePesertas'])
                ->where([
                    'kegiatan_id' => $kegiatan->id,
                    'is_approved' => 1,
                    'mahasiswa_id' => $mahasiswa->id
                ])->first();

            DB::beginTransaction();

            foreach ($peserta->filePesertas as $filePeserta) {
                if ($filePeserta->is_need_edit) {
                    $filePeserta->is_need_edit = 0;
                }
                $filePeserta->is_dinilai = 1;
                $filePeserta->updated_at = date('Y-m-d H:i:s');
                $filePeserta->save();
            }

            DB::commit();

            return view('mahasiswa.portofolio.submit_file_success');
        }

        return view('mahasiswa.portofolio.submit_file');
    }
}
