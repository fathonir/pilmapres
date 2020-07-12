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
            'mahasiswa.perguruanTinggi:id,nama_pt'
        ])->find($plotReviewer->tahapanPeserta->peserta_id);

        $filePesertas = DB::select(
            "select fp.*, jp.jenis_prestasi, tp.tingkat_prestasi, hp.skor_id, hp.komentar
            from file_pesertas fp
            join tingkat_prestasis tp on tp.id = fp.tingkat_prestasi_id
            join jenis_prestasis jp on jp.id = fp.jenis_prestasi_id
            left join hasil_penilaians hp on hp.file_peserta_id = fp.id and hp.plot_reviewer_id = :plot_reviewer_id
            where fp.is_dinilai = 1 and fp.peserta_id = :peserta_id
            order by fp.id",
            ['plot_reviewer_id' => $plot_reviewer_id, 'peserta_id' => $peserta->id]
        );


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

        return view('reviewer.portofolio.show', compact('peserta', 'filePesertas', 'filePesertaPath', 'kelompokSkors'));
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
     * @param  int  $plot_reviewer_id plot_reviewer.id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $plot_reviewer_id)
    {
        /** @var FilePeserta $filePeserta */
        $filePeserta = FilePeserta::find($request->input('file_peserta_id'));

        /** @var Skor $skor */
        $skor = Skor::find($request->input('skor_id'));

        try {

            DB::beginTransaction();

            /** @var HasilPenilaian $hasilPenilaian */
            $hasilPenilaian = $filePeserta->hasilPenilaians()->where('plot_reviewer_id', $plot_reviewer_id)->first();

            if ($hasilPenilaian == null) {

                $filePeserta->hasilPenilaians()->create([
                    'plot_reviewer_id' => $plot_reviewer_id,
                    'skor_id' => $skor->id,
                    'skor' => $skor->skor,
                    'nilai' => $skor->skor,
                    'komentar' => $request->input('komentar')
                ]);

            } else {

                $hasilPenilaian->skor_id = $skor->id;
                $hasilPenilaian->skor = $skor->skor;
                $hasilPenilaian->nilai = $skor->skor;
                $hasilPenilaian->komentar = $request->input('komentar');
                $hasilPenilaian->save();

            }

            /** @var PlotReviewer $plotReviewer */
            $plotReviewer = PlotReviewer::with([
                'hasilPenilaians',
                'hasilPenilaians.filePeserta:id,is_dinilai'
            ])->find($plot_reviewer_id);

            $plotReviewer->nilai_reviewer = 0;
            foreach ($plotReviewer->hasilPenilaians as $hasilPenilaian) {
                if ($hasilPenilaian->filePeserta->is_dinilai == 1) {
                    $plotReviewer->nilai_reviewer += $hasilPenilaian->nilai;
                }
            }
            $plotReviewer->save();

            DB::commit();

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
