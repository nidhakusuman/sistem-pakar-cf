<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Title -->
    <title>Deteksi Speech Delay</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('') }}assets/img/favicon.ico">


    <!-- DEMO CHARTS -->
    <link rel="stylesheet" href="{{ asset('') }}assets/demo/chartist.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/demo/chartist-plugin-tooltip.css">

    <!-- Template -->
    <link rel="stylesheet" href="{{ asset('') }}assets/graindashboard/css/graindashboard.css">

</head>

<body class="has-sidebar has-fixed-sidebar-and-header">
<!-- Header -->
<header class="header bg-body">
    <nav class="navbar flex-nowrap p-0">
        <div class="navbar-brand-wrapper d-flex align-items-center col-auto">

            <!-- Logo For Desktop View -->
            <a class="navbar-brand navbar-brand-desktop" href="/">
                <img class="side-nav-hide-on-closed" src="{{ asset('') }}assets/img/logoo.png" alt="Graindashboard" style="width: auto; height: auto;">
            </a>
            <!-- End Logo For Desktop View -->
        </div>

        <div class="header-content col px-md-3">
            <div class="d-flex align-items-center">
                <!-- Side Nav Toggle -->
                <a  class="js-side-nav header-invoker d-flex mr-md-2" href="#"
                    data-close-invoker="#sidebarClose"
                    data-target="#sidebar"
                    data-target-wrapper="body">
                    <i class="gd-align-left"></i>
                </a>
                <!-- End Side Nav Toggle -->

                <!-- User Notifications -->
                <div class="dropdown ml-auto">

                </div>
                <!-- End User Notifications -->
                <!-- User Avatar -->
                <div class="dropdown mx-3 dropdown ml-2">
                    <a id="profileMenuInvoker" class="header-complex-invoker" href="#" aria-controls="profileMenu" aria-haspopup="true" aria-expanded="false" data-unfold-event="click" data-unfold-target="#profileMenu" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-animation-in="fadeIn" data-unfold-animation-out="fadeOut">
                        <!--img class="avatar rounded-circle mr-md-2" src="#" alt="John Doe"-->
                        <span class="mr-md-2 avatar-placeholder">{{ strtoupper(mb_substr(auth()->user()->name, 0, 1)) }}</span>
                        <span class="d-none d-md-block">{{ auth()->user()->name }}</span>
                        <i class="gd-angle-down d-none d-md-block ml-2"></i>
                    </a>

                    <ul id="profileMenu" class="unfold unfold-user unfold-light unfold-top unfold-centered position-absolute pt-2 pb-1 mt-4 unfold-css-animation unfold-hidden fadeOut" aria-labelledby="profileMenuInvoker" style="animation-duration: 300ms;">
                        <li class="unfold-item unfold-item-has-divider">
                            <a class="unfold-link d-flex align-items-center text-nowrap" href="">
                    <span class="unfold-item-icon mr-3">
                      <i class="gd-power-off"></i>
                    </span>
                                Sign Out
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End User Avatar -->
            </div>
        </div>
    </nav>
</header>
<!-- End Header -->

<main class="main">
    @include('layouts.partials.sidebar')

    @yield('content')

</main>


<script src="{{ asset('') }}assets/graindashboard/js/graindashboard.js"></script>
<script src="{{ asset('') }}assets/graindashboard/js/graindashboard.vendor.js"></script>
<!-- ... -->
<script src="{{ asset('') }}assets/graindashboard/js/graindashboard.js"></script>
<script src="{{ asset('') }}assets/graindashboard/js/graindashboard.vendor.js"></script>

<!-- DEMO CHARTS -->
<script src="{{ asset('') }}assets/demo/resizeSensor.js"></script>
<script src="{{ asset('') }}assets/demo/chartist.js"></script>
<script src="{{ asset('') }}assets/demo/chartist-plugin-tooltip.js"></script>
<script src="{{ asset('') }}assets/demo/gd.chartist-area.js"></script>
<script src="{{ asset('') }}assets/demo/gd.chartist-bar.js"></script>
<script src="{{ asset('') }}assets/demo/gd.chartist-donut.js"></script>

<script>
  // Tambahkan event listener untuk tombol "Sign Out"
  document.querySelector('.unfold-link').addEventListener('click', function(e) {
    e.preventDefault(); // Mencegah tindakan default dari elemen <a>

    // Kirim permintaan log out ke server
    fetch('/logout', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Menggunakan token CSRF Laravel jika diperlukan
      },
      // Tambahkan konfigurasi lainnya seperti body jika diperlukan
    })
    .then(response => {
      if (response.ok) {
        // Log out berhasil, lakukan pengalihan halaman atau tindakan lainnya
        window.location.href = '/login'; // Contoh: pengalihan ke halaman login
      } else {
        // Log out gagal, tangani kesalahan jika diperlukan
      }
    })
    .catch(error => {
      // Tangani kesalahan jaringan atau permintaan jika diperlukan
    });
  });
</script>
@stack('js')
</body>
</html>
