<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>PPA Kalvari 868 | XIV</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicons/favicon.ico">
    <link rel="manifest" href="{{ asset('falcon-style/public/assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="../assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="{{ asset('falcon-style/public/assets/js/config.js') }}"></script>
    <script src="{{ asset('falcon-style/public/vendors/overlayscrollbars/OverlayScrollbars.min.js') }}"></script>

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('falcon/public/vendors/overlayscrollbars/OverlayScrollbars.min.css') }}" rel="stylesheet">
    <link href="{{ asset('falcon/public/assets/css/theme-rtl.min.css') }}" rel="stylesheet" id="style-rtl">
    <link href="{{ asset('falcon/public/assets/css/theme.min.css') }}" rel="stylesheet" id="style-default">
    <link href="{{ asset('falcon/public/assets/css/user-rtl.min.css') }}" rel="stylesheet" id="user-style-rtl">
    <link href="{{ asset('falcon/public/assets/css/user.min.css') }}" rel="stylesheet" id="user-style-default">
    <link href="{{ asset('falcon/public/vendors/flatpickr/flatpickr.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('falcon/public/vendors/dropzone/dropzone.min.css') }}" rel="stylesheet" />
    <script>
      var isRTL = JSON.parse(localStorage.getItem('isRTL'));
      if (isRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
      } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
      }
    </script>
  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <div class="container" data-layout="container">
        <script>
          var isFluid = JSON.parse(localStorage.getItem('isFluid'));
          if (isFluid) {
            var container = document.querySelector('[data-layout]');
            container.classList.remove('container');
            container.classList.add('container-fluid');
          }
        </script>
        <nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
          <script>
            var navbarStyle = localStorage.getItem("navbarStyle");
            if (navbarStyle && navbarStyle !== 'transparent') {
              document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
            }
          </script>
          <div class="d-flex align-items-center">
            
            <div class="toggle-icon-wrapper">

              <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>

            </div><a class="navbar-brand" href="/portal">
              <div class="d-flex align-items-center py-3"><img class="me-2" src="{{ asset('assets/dawn.png') }}" alt="" width="40" /><span class="font-sans-serif">Kalvari</span>
              </div>
            </a>
          </div>
          @include('layouts.sidebar')
          
        </nav>
        <div class="content">

          @include('layouts.navbar')

          {{-- Taruh Yield Disini --}}
          @yield('dashboardstaff')
          @yield('dashboardanak')

          {{-- Koordinator --}}
          {{-- Staff Masters --}}
          @yield('liststaff')
          @yield('detailstaff')
          @yield('createstaff')
          @yield('update')
          {{-- Jabatan --}}
          @yield('listjabatan')
          @yield('inputjabatan')
          @yield('updatejabatan')
          {{-- Gaji --}}
          @yield('listgaji')
          @yield('inputgajistaff')
          @yield('detailgaji')
          {{-- Cuti --}}
          @yield('cutialter')
          @yield('tambahcutibang')
          @yield('detailcutibang')



          {{-- Bendahara --}}
          {{-- TRX Bantuan --}}
          @yield('listbantuan')
          @yield('detailbantuan')
          @yield('formplusbantuan')
          {{-- TRX Sponsor --}}
          @yield('listpenerimaansponsor')
          @yield('detailpenerimaansponsor')
          @yield('tambahdatapenerimaansponsor')
          {{-- TRX Rewards --}}
          @yield('rewardslist')
          @yield('detailreward')
          @yield('formpenerimaanrewards')
          {{-- Laporan Keuangan --}}
          @yield('lappengeluaran')
          @yield('sponsorshipview')


          {{-- Sekretaris --}}
          {{-- Sponsor Masters --}}
          @yield('listdatasponsor')
          @yield('createdatasponsorheader')
          @yield('createdatasponsorcontent')
          @yield('updatedatasponsorheader')
          @yield('updatedatasponsorcontent')
          {{-- Absensi Staff --}}
          @yield('listabsenstaff')
          @yield('formtambahabsenstaff')
          @yield('detailabsenstaff')
          {{-- Kegiatan PPA --}}
          @yield('listjadwalkegiatan')
          @yield('formtambahkegiatan')
          @yield('updatekegiatan')
          @yield('detailkegiatan')


          {{-- Mentor --}}
          {{-- Kode Absensi Masters --}}
          @yield('listkodeabsensi')
          @yield('formkodeabsensi')
          @yield('formeditkodeabsensi')
          {{-- Anak Masters --}}
          @yield('daftaranak')
          @yield('anakedit-header')
          @yield('anakedit-main')
          @yield('detaildataanak')
          @yield('anakupdate-header')
          @yield('anakupdate-main')
          {{-- Kelompok Umur Masters --}}
          @yield('listkelompokumur')
          @yield('formeditdata')
          @yield('formtambahdata')
          {{-- Master Tutor --}}
          @yield('listtutor')
          @yield('tutortambah')

          {{-- Tutor --}}
          {{-- Absensi Anak / Kelompok Umur --}}
          @yield('dataabsenanak')
          @yield('inputabsenanak')
          @yield('detailabsenanak')
          {{-- Lesson Plan --}}
          @yield('formtambahlp')
          @yield('daftarlessonplan')
          {{-- Logbook Mengajar --}}
          @yield('daftarlogbook')
          @yield('tambahlogbookbaru')

          {{-- Index Kelompok Umur --}}
          @yield('indexlistku')


          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>


          <footer class="footer">
            <div class="row g-0 justify-content-between fs--1 mt-4 mb-3">
              <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 text-600">Sistem Informasi<span class="d-none d-sm-inline-block">| </span><br class="d-sm-none" /> 2023 &copy; Universitas Ma Chung</p>
              </div>
              <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 text-600">v1.4.0</p>
              </div>
            </div>
          </footer>
        </div>
        
      </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ asset('falcon/public/vendors/popper/popper.min.js') }}"></script>
    <script src="{{ asset('falcon/public/vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('falcon/public/vendors/anchorjs/anchor.min.js') }}"></script>
    <script src="{{ asset('falcon/public/vendors/is/is.min.js') }}"></script>
    <script src="{{ asset('falcon/public/vendors/chart/chart.min.js') }}"></script>
    <script src="{{ asset('falcon/public/vendors/leaflet/leaflet.js') }}"></script>
    <script src="{{ asset('falcon/public/vendors/leaflet.markercluster/leaflet.markercluster.js') }}"></script>
    <script src="{{ asset('falcon/public/vendors/leaflet.tilelayer.colorfilter/leaflet-tilelayer-colorfilter.min.js') }}"></script>
    <script src="{{ asset('falcon/public/vendors/countup/countUp.umd.js') }}"></script>
    <script src="{{ asset('falcon/public/vendors/fullcalendar/main.min.js') }}"></script>
    <script src="{{ asset('falcon/public/assets/js/flatpickr.js') }}"></script>
    <script src="{{ asset('falcon/public/vendors/dayjs/dayjs.min.js') }}"></script>
    <script src="{{ asset('falcon/public/vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('falcon/public/vendors/lodash/lodash.min.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{ asset('falcon/public/vendors/list.js/list.min.js') }}"></script>
    <script src="{{ asset('falcon/public/assets/js/theme.js') }}"></script>
    <script src="{{ asset('falcon/public/assets/js/flatpickr.js') }}"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="vendors/chart/chart.min.js"></script>
    <script src="{{ asset('falcon/public/vendors/dropzone/dropzone.min.js')}}"></script>
    @yield('jawascript')\
    @yield('getPeriodeAbsensi')
    @yield('js')
    @yield('jsx')
    @yield('charts-dashboard')
    @yield('chartpie')
    @yield('charts')
  </body>

</html>