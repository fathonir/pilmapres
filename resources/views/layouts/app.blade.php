<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PILMAPRES 2020</title>
    <!-- Styles -->
    {!! Html::style('css/AdminLTE.min.css') !!}
    {!! Html::style('css/font-awesome.min.css') !!}
    {!! Html::style('css/select2.min.css') !!}
    {!! Html::style('css/bootstrap.min.css') !!}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @yield('content')
    </div>

    <!-- Scripts -->
    {!! Html::script('js/jquery-2.2.3.min.js') !!}
    {!! Html::script('js/bootstrap.min.js') !!}
    {!! Html::script('js/adminlte.min.js') !!}
    {!! Html::script('js/icheck.min.js') !!}
    <script src="{{ asset('js/app.js') }}"></script>
    {!! Html::script('js/select2.full.min.js') !!}
    <script>
        $(document).ready(function() {
            $('.pt').select2({
                minimumInputLength: 3
            });

            $('.prodi').select2();

            $('.pt').on('change',function(e){
              $('.loading').show();
              $('.tabProdi').hide();
              var id = e.target.value;
              $.get('/ajax-prodi?id='+id, function(data){
                $('.prodi').empty();
                $.each(data,function(index,subcatObj){
                  $('.prodi').append('<option value="'+subcatObj.id+'">'+subcatObj.jenjang_didik_nama+' - '+subcatObj.nama+'</option>');
                });
                $('.loading').hide();
                $('.tabProdi').show();
              });
            });

            $('.cariMahasiswa').click(function(e) {
              var pt = $('.pt').val();
              var prodi = $('.prodi').val();
              var nim = $('.nim').val();
              $('.loadingSearchMahasiswa').show();

              if (nim == '') {
                $('.NimNull').show();
                $('.loadingSearchMahasiswa').hide();
                $('.confirmMahasiswa').hide();
                $('.pilihMahasiswa').hide();
              }else{
                $('.NimNull').hide();
                $.get('/ajax-get-mhs-by-nim?pt='+pt+'&prodi='+prodi+'&nim='+nim, function(data){
                  if (data == '') {
                    $('.MahasiswaFalse').show();
                    $('.confirmMahasiswa').hide();
                    $('.pilihMahasiswa').hide();
                    $('.NimNull').hide();
                    $('.loadingSearchMahasiswa').hide();
                  }else{
                    $('.MahasiswaFalse').hide();
                    $('.NimNull').hide();
                    $.each(data,function(index,subcatObj){
                      $('.namaMahasiswa').val(subcatObj.nama);
                      $('.tanggalLahir').val(subcatObj.tgl_lahir);
                    });
                    $('.loadingSearchMahasiswa').hide();
                    $('.confirmMahasiswa').show();
                    $('.pilihMahasiswa').show();
                    $('.copyForm').show();
                  }
                });
              }
              
            });

            $('.pilihMahasiswa').click(function(e) {
              var pt = $('.pt').val();
              var namapt = $(".pt option:selected").text();
              var prodi = $('.prodi').val();
              var namaprodi = $(".prodi option:selected").text();
              var nama = $('.namaMahasiswa').val();
              var nim = $('.nim').val();

              $.get('/ajax-check-mhs-by-nim?nim='+nim, function(data){
                if (data) {
                  $('.cekDataMhsNim').show();
                  $('.confirmMahasiswa').hide();
                  $('.pilihMahasiswa').hide();
                }else{
                  $('.cekDataMhsNim').hide();
                  $('.nama_pt').val(namapt);
                  $('.nama_prodi').val(namaprodi);
                  $('.mhs_nama').val(nama);
                  $('.mhs_nim').val(nim);
                  $('.id_prodi').val(prodi);
                  $('.id_pt').val(pt);
                }
                
              });
            });

            var countFailedEmail=0;
            $(function() {
             $('.simpanData').click(function(e) {
                var idPt = $('.id_pt').val();
                var email = $('.email').val();
                var suratPengantar = $('.suratPengantar').val();

                if (idPt == '') {
                  $('.cekDataMhs').show();
                }else if(email == ''){
                  $('.cekDataMhs').hide();
                  $('.cekDataEmail').show();
                }else if(suratPengantar == ''){
                  $('.cekDataEmailValid').hide();
                  $('.cekDataEmail').hide();
                  $('.cekDataSurat').show();
                }else if(countFailedEmail == 1){
                  $('.cekDataEmailValid').hide();
                  $('.cekDataEmail').hide();
                  $('.cekDataSurat').hide();
                  $('.cekDataEmailValid').show();
                }else{
                  $(".pushData").submit();
                }

              });
          });

          $('.email').blur(function() {
              var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
              if (testEmail.test(this.value)){
                $('.cekDataEmailValid').hide();
                countFailedEmail = 0;
              }else{ 
                countFailedEmail = 1;
                $('.cekDataEmailValid').show();
              }
          });

        });
    </script>
</body>
</html>
