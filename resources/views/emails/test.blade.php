<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<style>

body {
    padding: 0;
    margin: 0;
}

html { -webkit-text-size-adjust:none; -ms-text-size-adjust: none;}
@media only screen and (max-device-width: 680px), only screen and (max-width: 680px) { 
    *[class="table_width_100"] {
    width: 96% !important;
  }
  *[class="border-right_mob"] {
    border-right: 1px solid #dddddd;
  }
  *[class="mob_100"] {
    width: 100% !important;
  }
  *[class="mob_center"] {
    text-align: center !important;
  }
  *[class="mob_center_bl"] {
    float: none !important;
    display: block !important;
    margin: 0px auto;
  } 
  .iage_footer a {
    text-decoration: none;
    color: #929ca8;
  }
  img.mob_display_none {
    width: 0px !important;
    height: 0px !important;
    display: none !important;
  }
  img.mob_width_50 {
    width: 40% !important;
    height: auto !important;
  }
}
.table_width_100 {
  width: 680px;
}
</style>

<div id="mailsub" class="notification" align="center">
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="min-width: 320px;">
  <tr>
    <td align="center" bgcolor="#eff3f8">


<table border="0" cellspacing="0" cellpadding="0" class="table_width_100" width="100%" style="max-width: 680px; min-width: 300px;">
    <tr>
      <td>
      <!-- padding -->
      </td>
    </tr>
  <!--header -->
    <tr>
      <td align="center" bgcolor="#ffffff">
        <!-- padding -->
        <table width="90%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="center">
              <a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; float:left; width:100%; padding:20px;text-align:center; font-size: 13px;">
              <font face="Arial, Helvetica, sans-seri; font-size: 13px;" size="3" color="#596167">
              <img src="{{ URL::asset('/front/img/FAI.png') }}" width="250" alt="Metronic" border="0"  /></font></a>
            </td>
            <td align="right">
            
            <tr>
              <td align="center" bgcolor="#fbfcfd">
                <font face="Arial, Helvetica, sans-serif" size="4" color="#57697e" style="font-size: 15px;">
                  <table width="90%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td>
                        <h2>Selamat Datang {{ $nama_peserta }}</h2><br>
                        <p>
                          Gunakan Email Dan Password Ini Untuk Login :<br>
                        </p>
                        <p>
                          Email : {{ $email_peserta }}<br>
                        </p>
                        <p>
                          Password : {{ $password_peserta }}
                        </p>
                      </td>
                    </tr>
                    <tr>
                      <td align="center">
                        <div style="line-height: 24px;">
                          <a style="background-color: #f20487; padding: 10px 50px; border-radius: 3px; border: none;  font-size: 20px; font-family: sans-serif;" href="{{url('user/verify', $token_peserta)}}" target="_blank" style="color: #F1F1F1;text-decoration: none;font-size: 16px;font-weight: 600;"> Verifikasi email 
                          </a>
                        </div>
                        <!-- padding -->
                        <div style="height: 60px; line-height: 60px; font-size: 10px;">
                        </div>
                      </td>
                    </tr>
                  </table>
                </font>
              </td>
            </tr>
            <tr>
              <td class="iage_footer" align="center" bgcolor="#ffffff">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center" style="padding:20px;flaot:left;width:100%; text-align:center;">
                      <font face="Arial, Helvetica, sans-serif" size="3" color="#96a5b5" style="font-size: 13px;">
                        <span style="font-family: Arial, Helvetica, sans-serif; font-size: 13px; color: #96a5b5;">
                          PHP2D 2020
                        </span>
                      </font>        
                    </td>
                  </tr>      
                </table>
              </td>
            </tr>
            <tr>
              <td>
              </td>
            </tr>
        </table>
      </td>
    </tr>
</table>