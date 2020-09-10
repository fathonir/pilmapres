<?php

namespace App\Http\Controllers\Reviewer;

use App\HasilPenilaian;
use App\Kegiatan;
use App\PlotReviewer;
use App\Syarat;
use App\Tahapan;
use App\TahapanPeserta;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use URL;

class WawancaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kegiatans = Kegiatan::with('program')->where('is_aktif', true)->get();
        $pesertas = [];

        if ($request->get('kegiatan_id')) {
            $dosen_id = Auth::user()->dosen->id;
            $pesertas = DB::table('plot_reviewers as pr')
                ->join('tahapan_pesertas as tp', 'tp.id', '=', 'pr.tahapan_peserta_id')
                ->join('pesertas as p', 'p.id', '=', 'tp.peserta_id')
                ->join('mahasiswas as m', 'm.id', '=', 'p.mahasiswa_id')
                ->join('program_studis as ps', 'ps.id', '=', 'm.program_studi_id')
                ->join('perguruan_tinggis as pt', 'pt.id', '=', 'm.perguruan_tinggi_id')
                ->where('tp.tahapan_id', Tahapan::WAWANCARA_KARYA_UNGGULAN)
                ->where('pr.dosen_id', $dosen_id)
                ->select('pr.id', 'm.nama', 'ps.nama_prodi', 'pt.nama_pt', 'pr.nilai_reviewer')
                ->orderByRaw(1)
                ->get();
        }

        return view('reviewer.wawancara.index', compact('kegiatans', 'pesertas'));
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
     * @param  int  $plot_reviewer_id
     * @return \Illuminate\Http\Response
     */
    public function show($plot_reviewer_id)
    {
        /** @var PlotReviewer $plotReviewer */
        $plotReviewer = PlotReviewer::where('id', $plot_reviewer_id)->first();
        /** @var TahapanPeserta $tahapanPeserta */
        $peserta = TahapanPeserta
            ::with([
                'peserta',
                'peserta.kelompokPeserta',
                'peserta.mahasiswa',
                'peserta.mahasiswa.programStudi',
                'peserta.mahasiswa.perguruanTinggi'])
            ->where('id', $plotReviewer->tahapan_peserta_id)
            ->where('tahapan_id', Tahapan::WAWANCARA_KARYA_UNGGULAN)
            ->first()->peserta;

        // Syarat File Portofolio
        $syarat = Syarat
            ::where(['kegiatan_id' => $peserta->kegiatan_id, 'tahapan_id' => Tahapan::BABAK_PENYISIHAN_1])
            ->select('id')->first();

        $filePesertaPathEnv = config('app.file_peserta_path');
        $filePesertaPath = strtr($filePesertaPathEnv, [
            '{kegiatan_id}' => $peserta->kegiatan_id,
            '{peserta_id}' => $peserta->id,
            '{tahapan_id}' => Tahapan::BABAK_PENYISIHAN_1,
        ]);

        // File Portofolio
        $filePesertas = $peserta->filePesertas()
            ->with('hasilPenilaians')
            ->where(['syarat_id' => $syarat->id, 'is_dinilai' => 1])->get();

        $penilaians = DB::table('plot_reviewers as pr')
            ->select(['kp.*', 'hp.skor', 'hp.nilai'])
            ->join('tahapan_pesertas as tp', 'tp.id', '=', 'pr.tahapan_peserta_id')
            ->join('pesertas as p', 'p.id', '=', 'tp.peserta_id')
            ->join('komponen_penilaians as kp', function ($join) {
                $join->on('kp.kegiatan_id', '=', 'p.kegiatan_id');
                $join->on('kp.tahapan_id', '=', 'tp.tahapan_id');
                $join->on('kp.kelompok_peserta_id', '=', 'p.kelompok_peserta_id');
            })
            ->leftJoin('hasil_penilaians as hp', function ($join) {
                $join->on('hp.plot_reviewer_id', '=', 'pr.id');
                $join->on('hp.komponen_penilaian_id', '=', 'kp.id');
            })
            ->where('pr.id', $plot_reviewer_id)->get();

        return view('reviewer.wawancara.show', compact(
            'plotReviewer', 'peserta', 'penilaians',
            'filePesertaPath', 'filePesertas'
        ));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $plot_reviewer_id)
    {
        $penilaians = DB::table('plot_reviewers as pr')
            ->select(['kp.*', 'hp.id as hp_id', 'hp.skor', 'hp.nilai'])
            ->join('tahapan_pesertas as tp', 'tp.id', '=', 'pr.tahapan_peserta_id')
            ->join('pesertas as p', 'p.id', '=', 'tp.peserta_id')
            ->join('komponen_penilaians as kp', function ($join) {
                $join->on('kp.kegiatan_id', '=', 'p.kegiatan_id');
                $join->on('kp.tahapan_id', '=', 'tp.tahapan_id');
                $join->on('kp.kelompok_peserta_id', '=', 'p.kelompok_peserta_id');
            })
            ->leftJoin('hasil_penilaians as hp', function ($join) {
                $join->on('hp.plot_reviewer_id', '=', 'pr.id');
                $join->on('hp.komponen_penilaian_id', '=', 'kp.id');
            })
            ->where('pr.id', $plot_reviewer_id)->get();

        $validator = Validator::make($request->post(), [
            'skor.*' => 'required',
            'komentar' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect(URL::current())->withInput()->withErrors($validator);
        }

        DB::beginTransaction();

        /** @var PlotReviewer $plotReviewer */
        $plotReviewer = PlotReviewer::find($plot_reviewer_id);

        $plotReviewer->nilai_reviewer = 0;

        // Hasil Penilaian
        foreach ($penilaians as $penilaian) {
            // Jika belum ada, create
            /** @var HasilPenilaian $hasilPenilaian */
            if ($penilaian->hp_id == '') {
                $hasilPenilaian = new HasilPenilaian();
                $hasilPenilaian->plot_reviewer_id = $plot_reviewer_id;
                $hasilPenilaian->komponen_penilaian_id = $penilaian->id;
                $hasilPenilaian->created_at = date('Y-m-d H:i:s');
            } else {
                $hasilPenilaian = HasilPenilaian::find($penilaian->hp_id);
            }

            $hasilPenilaian->skor = $request->post('skor')[$penilaian->id];
            $hasilPenilaian->nilai = $request->post('skor')[$penilaian->id] * $penilaian->bobot;
            $hasilPenilaian->updated_at = date('Y-m-d H:i:s');
            $hasilPenilaian->save();

            $plotReviewer->nilai_reviewer += $hasilPenilaian->nilai;
        }

        // Komentar

        $plotReviewer->komentar = $request->post('komentar');
        $plotReviewer->updated_at = date('Y-m-d H:i:s');
        $plotReviewer->save();

        DB::commit();

        return redirect(URL::current())->with(['alert-success' => true, 'plotReviewer' => $plotReviewer]);
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
