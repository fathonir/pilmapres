<!DOCTYPE html>
<html>
  <body style="background-color: #222533; padding: 20px; font-family: font-size: 14px; line-height: 1.43; font-family: &quot;Helvetica Neue&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif;">
    <div style="max-width: 600px; margin: 0px auto; background-color: #fff; box-shadow: 0px 20px 50px rgba(0,0,0,0.05);">
      <table style="width: 100%;">
      <tr>
        <td style="background-color: #fff;">
          <img src="{{ URL::asset('/front/img/logo-sindikker.png') }}" style="width: auto; max-width: 170px; padding: 20px">
        </td>
      </tr>
      </table>
      <div style="padding: 60px 70px; border-top: 1px solid rgba(0,0,0,0.05);">
        <h1 style="margin-top: 0px;">
          Dear {{ $user->name }},
        </h1>
        <div style="color: #636363; font-size: 14px;">
          <p>
            Data verifikasi mahasiswa yang anda ajukan ditolak. dengan detail sebagai berikut :
          </p>
        </div>
        <!-- <a href="#" style="padding: 8px 20px; background-color: #4B72FA; color: #fff; font-weight: bolder; font-size: 16px; display: inline-block; margin: 20px 0px; margin-right: 20px; text-decoration: none;">Activate my account</a> -->
        <h5 style="margin-bottom: -10px;">
          Nama : {{ $user->nama_mhs }}
        </h5>
        <h5 style="margin-bottom: -10px; margin-top: 12px;">
          Nim : {{ $user->nim_mhs }}
        </h5>
        <h5 style="margin-bottom: -10px; margin-top: 12px;">
          Username Sindikker : {{ $user->user_name_mhs }}
        </h5>
        <h5 style="margin-bottom: -10px; margin-top: 12px;">
          Perguruan Tinggi : {{ $user->nama_pt }}
        </h5>
        <h5 style="margin-bottom: 10px; margin-top: 12px;">
          Program Studi : {{ $user->nama_prodi }}
        </h5>
        <div style="color: #636363; font-size: 14px;">
          <p>
            Data tersebut tidak sesuai dengan data pribadi anda. Silahkan untuk menghubungi pihak perguruan tinggi untuk mengkonfirmasi secara langsung. Terimakasih.
          </p>
        </div>
      </div>
      <div style="background-color: #F5F5F5; padding: 40px; text-align: center;">
        <div style="margin-top: 1px; padding-top: 20px; border-top: 1px solid rgba(0,0,0,0.05);">
          <div style="color: #A5A5A5; font-size: 10px; margin-bottom: 5px;">
            Sistem Informasi Pendidikan dan Dunia Kerja (Sindikker)
          </div>
          <div style="color: #A5A5A5; font-size: 10px; margin-bottom: 5px;">
            Direktorat Jenderal Pembelajaran dan Kemahasiswaan 
          </div>
          <div style="color: #A5A5A5; font-size: 10px;">
            Daerah Khusus Ibukota Jakarta 10270, Indonesia. Gedung D Lt 7, Jl. Jenderal Sudirman, Pintu I Senayan.
          </div>
          <div style="color: #A5A5A5; font-size: 10px;">
            Telp: +62 (21) 1500661
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
