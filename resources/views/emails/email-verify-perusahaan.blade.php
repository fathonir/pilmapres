<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
    </head>

    <body>
        <table style="width: 600px; border: 0px; border-collapse: collapse;">
            <tbody>
                <tr>
                    <td style="padding-bottom: 0px; border-top: 5px solid #2d2994">
                       <div style="margin-top:20px; text-align: center;">
                            <img src="{{ URL::asset('/front/img/logo-sindikker.png') }}" style="width: auto; max-width: 170px;">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="padding-bottom: 0px; text-align: center;">
                        <h1 style="text-align: center;margin-top: 30px;font-family: sans-serif;color: #444;padding-bottom: 0px;">Selamat datang di platform Sindikker Dikti {{ $user->name }},</h1>
                        <p style="padding: 5px;color: #A4A4A4;font-family: sans-serif;font-size: 14px;width: 80%;text-align: center;margin:  0 auto;">Anda telah berhasil melakukan registrasi akun perusahaan dengan email <b> {{ $user->email }} </b>, Mohon untuk memverifikasi akun anda dengan menekan tombol "Verifikasi Akun" di bawah ini: </p>
                    </td>
                </tr>
                <tr>
                    <td style="padding-bottom: 50px;">
                        <div style="margin-top:20px; text-align: center;">
                            <a style="background-color: #2d2994; padding: 10px 50px; border-radius: 3px; border: none;  font-size: 20px; font-family: sans-serif;" href="{{url('user/verify', $user->token)}}" style="color: #F1F1F1;text-decoration: none;font-size: 16px;font-weight: 600;"> Verifikasi Akun 
                            </a>
                        </div>
                    </td>
                </tr>
                
                <tr>
                    <td style="font-size: 10px;">
                    	<div style="border-bottom: 2px solid #2d2994; margin-top: -10px;">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="padding-bottom: 5px; font-size: 10px;">
                        <span style="font-family: sans-serif;">Sistem Informasi Pendidikan dan Dunia Kerja</span>
                        <span style="font-family: sans-serif;">Direktorat Jenderal Pembelajaran dan Kemahasiswaan</span>
                        <span style="font-family: sans-serif;">Daerah Khusus Ibukota Jakarta 10270, Indonesia. Gedung D Lt 7, Jl. Jenderal Sudirman, Pintu I Senayan,</span>
                        <span style="font-family: sans-serif;">Telp: +62 (21) 1500661</span>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 25px 0px;">
                        <div style="border-bottom: 2px solid #2d2994; margin-top: -20px;">
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>