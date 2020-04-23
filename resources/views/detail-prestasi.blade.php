@extends('layouts.home')

@section('content')

  <div class="page-header">
    <div class="container">
        <h1 class="title">Detail Prestasi</h1>
    </div>
    <div class="breadcrumb-box">
        <div class="container">
            <ul class="breadcrumb">
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="/detail-finalis">ANNISA DEWI NUGRAHANI</a>
                </li>
                <li class="active">
                    Detail Prestasi
                </li>
            </ul>
        </div>
    </div>
</div>
<section class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="/detail-finalis" class="badge badge-primary back"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
            </div>      
        </div>      
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <div class="panel panel-primary">
                            <div class="panel-body table-responsive">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td class="font-bold">Nama Prestasi</td>
                                            <td>:</td>
                                            <td>1st Winner of Online Social Campaign Competition World Antibiotic Awareness Week (WAAW) 2018</td>
                                        </tr>
                                        <tr>
                                            <td class="font-bold">Tahun Perolehan</td>
                                            <td>:</td>
                                            <td>2018</td>
                                        </tr>
                                        <tr>
                                            <td class="font-bold">Pencapaian</td>
                                            <td>:</td>
                                            <td>Juara 1</td>
                                        </tr>
                                        <tr>
                                            <td class="font-bold">Lembaga Pemberi/Event</td>
                                            <td>:</td>
                                            <td>Asian Medical Students’ Association International (AMSA International)</td>
                                        </tr>
                                        <tr>
                                            <td class="font-bold">Individu/Kelompok</td>
                                            <td>:</td>
                                            <td><span class="label label-success">Kelompok</span></td>
                                        </tr>
                                        <tr>
                                            <td class="font-bold">Tingkat</td>
                                            <td>:</td>
                                            <td><span class="label label-danger">Internasional</span></td>
                                        </tr>
                                        <tr>
                                            <td class="font-bold">Keterangan Tambahan</td>
                                            <td>:</td>
                                            <td>
                                                <p>
                                                    World Antibiotic Awareness Week (WAAW) merupakan sebuah kompetisi daring internasional yang diadakan oleh AMSA International yang diselenggarakan pada bulan September hingga November 2018. Kompetisi ini diikuti oleh anggota AMSA International yang terdiri dari 27 chapters dari negara-negara di seluruh dunia yaitu Australia, Bangladesh, Fillipina, Hong Kong (Republik Rakyat Tiongkok), India, Indonesia, Iran, Irlandia Utara, Jepang, Kamboja, Korea, Malaysia, Mesir, Mongolia, Myanmar, Nepal, Pakistan, Palestina, Republik Rakyat Tiongkok, Selandia Baru, Singapura, Taiwan, Thailand, Ukraina, United Kingdom (UK), Uzbekistan, dan Vietnam. Kompetisi ini diadakan untuk meningkatkan kesadaran komunitas global mengenai penggunaan antibiotik yang benar yang sejalan dengan kampanye World Health Organization (WHO) karena saat ini sedang marak terjadi kasus resistensi (kekebalan) terhadap antibiotik di seluruh dunia. Tema yang diusung pada kompetisi ini adalah "Reducing antibiotic-resistant individuals by reforming our standpoint in the global community". Pada tahun 2018, WAAW terdiri dari tiga cabang kompetisi yaitu Scientific Essay, Public Poster, dan Online Social Campaign. Pada kompetisi Online Social Campaign, peserta diharapkan membuat proposal mengenai kampanye yang diusungkan beserta media yang digunakan seperti poster, kuis, dan video. Pada kesempatan kali ini, saya dan tim membuat proposal yang berjudul “Break Up the Spread and Stop the Incidence of Antimicrobial Resistance with #Let'sBuildOurSENSE” dan komponen kampanye untuk satu minggu yang terdiri dari, Hari Pertama: Video tentang fakta resistensi antibiotik dan Poster “Let’sBuildOurSENSE” Hari Kedua: Teka-teki silang mengenai resistensi antibiotik Hari Ketiga: Video “A Wish” Hari Ketiga: Video/ Snapgram Challenge Hari Keempat: Poster “What Has the World Done for Antimicrobial Resistance?” Hari Kelima: “What Doctor Says about Antimicrobial Resistance?” Hari Keenam: Pengumuman juara kuis Hari Ketujuh: Penutupan dengan poster. Setelah dinyatakan menjadi pemenang (dalam hal ini adalah juara 1) berdasarkan indikator penilaian yang ada pada kompetisi ini, media kampanye yang dibuat oleh pemenang akan digunakan untuk menjadi bahan kampanye daring oleh AMSA Chapters di seluruh dunia. Informasi terkait kompetisi WAAW 2018 dapat diakses di http://www.amsa-international.org dan https://www.instagram.com/p/BoE1hswHnQV/. Proposal dan media kampanye pemenang dapat diakses di http://amsa-international.org/world-antibiotic-awareness-week-2018/ ataupun di Instagram AMSA International yaitu https://www.instagram.com/amsa_intl/
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title" id="panel-title">Sertifikat</h3>
                            </div>
                            <div class="panel-body">
                                <div class="post-image opacity">
                                    <img src="/front/img/xample-file-prestasi.jpg" width="1170" height="382" alt="" title="">
                                </div>
                            </div>
                        </div>
                    </div>      
                </div>      
            </div>      
        </div>      
    </div>
</section>
@endsection