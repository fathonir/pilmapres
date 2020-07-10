<?php

namespace App\Http\Controllers\Reviewer;

use App\FilePeserta;
use App\HasilPenilaian;
use App\Kegiatan;
use App\KelompokSkor;
use App\Peserta;
use App\PlotReviewer;
use App\Skor;
use App\Tahapan;
use App\TahapanPeserta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kegiatans = Kegiatan::with('program')->where('is_aktif', true)->get();
        $tahapans = Tahapan::all();
        $pesertas = null;

        if ($request->get('kegiatan_id') && $request->get('tahapan_id')) {
            $pesertas = DB::table('plot_reviewers as pr')
                ->join('tahapan_pesertas as tp', 'tp.id', '=', 'pr.tahapan_peserta_id')
                ->join('pesertas as p', 'p.id', '=', 'tp.peserta_id')
                ->join('mahasiswas as m', 'm.id', '=', 'p.mahasiswa_id')
                ->join('program_studis as ps', 'ps.id', '=', 'm.program_studi_id')
                ->join('perguruan_tinggis as pt', 'pt.id', '=', 'm.perguruan_tinggi_id')
                ->leftJoin('file_pesertas as fp', function($join) {
                    $join->on('fp.peserta_id', '=', 'p.id');
                    $join->on('fp.is_dinilai', '=', DB::raw(1));
                })
                ->leftJoin('hasil_penilaians as hp', function($join) {
                    $join->on('hp.plot_reviewer_id', '=', 'pr.id');
                    $join->on('hp.file_peserta_id', '=', 'fp.id');
                })
                ->where('pr.dosen_id', Auth::user()->dosen->id)
                ->where('tp.tahapan_id', $request->get('tahapan_id'))
                ->select('pr.id', 'm.nama', 'ps.nama_prodi', 'pt.nama_pt', 'pr.nilai_reviewer',
                    DB::raw('count(fp.id) as jumlah_file'),
                    DB::raw('count(hp.id) as jumlah_file_dinilai')
                )
                ->groupBy('pr.id', 'm.nama', 'ps.nama_prodi', 'pt.nama_pt', 'pr.nilai_reviewer')
                ->orderBy('pr.id')
                ->get();
        }

        return view('reviewer.portofolio.index', compact('kegiatans', 'tahapans', 'pesertas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $plot_reviewer_id
     * @return \Illuminate\Http\Response
     */
    public function show($plot_reviewer_id)
    {
        $plotReviewer = PlotReviewer::with('tahapanPeserta')->find($plot_reviewer_id);

        $peserta = Peserta::with([
            'kegiatan:id',
            'mahasiswa:id,nama,program_studi_id,perguruan_tinggi_id',
            'mahasiswa.programStudi:id,nama_prodi',
            'mahasiswa.perguruanTinggi:id,nama_pt',
            'filePesertas',
            'filePesertas.hasilPenilaian'
            ])->find($plotReviewer->tahapanPeserta->peserta_id);

        // Perlu diganti dari input-an tahapan (yang dari tahapan_proposal)
        $tahapan = Tahapan::where('nama_tahapan', 'Babak Penyisihan Tahap 1')->first();

        $filePesertaPathEnv = env('FILE_PESERTA_PATH');
        $filePesertaPath = strtr($filePesertaPathEnv, [
            '{kegiatan_id}' => $peserta->kegiatan->id,
            '{peserta_id}' => $peserta->id,
            '{tahapan_id}' => $tahapan->id,
        ]);

        // Untuk pilihan skor penilaian
        $kelompokSkors = KelompokSkor::with('skors')->get();

        return view('reviewer.portofolio.show', compact('peserta', 'filePesertaPath', 'kelompokSkors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id plot_reviewer.id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /** @var FilePeserta $filePeserta */
        $filePeserta = FilePeserta::with('hasilPenilaian')->find($request->input('file_peserta_id'));

        /** @var Skor $skor */
        $skor = Skor::find($request->input('skor_id'));

        try {

            if ($filePeserta->hasilPenilaian == null) {
                $filePeserta->hasilPenilaian()->create([
                    'plot_reviewer_id' => $id,
                    'skor_id' => $skor->id,
                    'skor' => $skor->skor,
                    'nilai' => $skor->skor,
                    'komentar' => $request->input('komentar')
                ]);
            } else {
                $filePeserta->hasilPenilaian->skor_id = $skor->id;
                $filePeserta->hasilPenilaian->skor = $skor->skor;
                $filePeserta->hasilPenilaian->nilai = $skor->skor;
                $filePeserta->hasilPenilaian->komentar = $request->input('komentar');
                $filePeserta->hasilPenilaian->save();
            }

            // Hitung total
            $plotReviewer = PlotReviewer::with('hasilPenilaians')->find($id);
            $plotReviewer->nilai_reviewer = $plotReviewer->hasilPenilaians()->sum('nilai');
            $plotReviewer->save();

            return json_encode(1);

        } catch (\Exception $ex) {
            return json_encode($ex->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
