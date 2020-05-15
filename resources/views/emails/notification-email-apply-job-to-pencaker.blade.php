<!DOCTYPE html>
<html>
  <body style="background-color: #222533; padding: 20px; font-family: font-size: 14px; line-height: 1.43; font-family: &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif;">
    <div style="max-width: 600px; margin: 0px auto; background-color: #fff; box-shadow: 0px 20px 50px rgba(0,0,0,0.05);">
      <table style="width: 100%;">
        <tr>
          <td style="background-color: #fff;">
            <img alt="" src="{{ asset('front/img/logo-sindikker.png') }}" style="width: 210px; padding: 20px">
          </td>
        </tr>
      </table>
      <div style="padding: 60px 70px; border-top: 1px solid rgba(0,0,0,0.05);">
        <h1 style="margin-top: 0px;">
         {{ $user->nama_perusahaan }} Memperbaharui Status Lamaran!
        </h1>
        <div style="color: #636363; font-size: 14px;">
          <p>
            {{ $user->name }}, Status lamaran anda telah di perbaharui menjadi {{ $user->status_lamaran }}!
          </p>
          <p>
            Kami akan mencoba menginformasikan seluruh kegiatan lamaran anda. 
          </p>
          <p>
            Kami berharap anda dapat menemukan pekerjaan terbaik melalui platform Sindikker. Terimakasih.
          </p>
        </div>
        <div style="border: 2px solid #4B72FA; padding: 40px; margin: 40px 0px;">
          <h4 style="margin-bottom: 20px; margin-top: 0px; font-size: 18px; display: inline-block; border-bottom: 1px dotted #111;">
            Berikut lowongan anda yang di perbaharui oleh {{ $user->nama_perusahaan }} :
          </h4>
          <table style="width: 100%;">
            <tr>
              <td style="padding: 10px 0px; border-bottom: 1px solid rgba(0,0,0,0.05);">
                <!-- <img alt="" src="img/bigicon7.png" style="width: 70px; height: auto;"> -->
              </td>
              <td style="padding-left: 30px; border-bottom: 1px solid rgba(0,0,0,0.05);">
                <div style="font-weight: bold; color: #4B72FA; font-size: 16px;">
                  {{ $user->nama_lowongan }}
                </div>
                <div style="font-size: 14px; color: #B8B8B8;">
                  {{ $user->deskripsi_lowongan }}
                </div>
              </td>
            </tr>
          </table>
          <table style="width: 100%; border-top: 1px solid #eee">
            <tr>
              <td style="font-size: 14px;">
                Nama Perusahaan: <strong>{{ $user->nama_perusahaan }}</strong>
              </td>
              <td style="text-align: right; padding-left: 20px;">
                <a href="{{ url('detail-lowongan-kerjaperusahaan/'.$user->lowongan_id) }}" style="padding: 8px 20px; background-color: #4B72FA; color: #fff; font-weight: bolder; font-size: 16px; display: inline-block; margin: 10px 0px; text-decoration: none;">Lihat Detail</a>
              </td>
            </tr>
          </table>
        </div>
      </div>
      <div style="background-color: #F5F5F5; padding: 40px; text-align: center;">
        <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid rgba(0,0,0,0.05);">
          <div style="color: #A5A5A5; font-size: 10px; margin-bottom: 5px;">
            Sistem Informasi Pendidikan dan Dunia Kerja
          </div>
          <div style="color: #A5A5A5; font-size: 10px; margin-bottom: 5px;">
            Direktorat Jenderal Pembelajaran dan Kemahasiswaan
          </div>
          <div style="color: #A5A5A5; font-size: 10px;">
            Daerah Khusus Ibukota Jakarta 10270, Indonesia. Gedung D Lt 7, 
          </div>
          <div style="color: #A5A5A5; font-size: 10px;">
            Jl. Jenderal Sudirman, Pintu I Senayan,
            Telp: +62 (21) 1500661
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
