<!doctype html>
<html class="h-100" lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <meta name="description" content="A growing collection of ready to use components for the CSS framework Bootstrap 5">
  <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
  <link rel="icon" type="image/png" sizes="96x96" href="img/favicon.png">
  <meta name="author" content="Holger Koenemann">
  <meta name="generator" content="Eleventy v2.0.0">
  <meta name="HandheldFriendly" content="true">
  <title>Stride HTML Template - Frontpage one</title>
  <link rel="stylesheet" href="{{ asset('') }}frontend/css/theme.min.css">

  <style>
    /* inter-300 - latin */
    @font-face {
      font-family: 'Inter';
      font-style: normal;
      font-weight: 300;
      font-display: swap;
      src: local(''),
        url('./../fonts/inter-v12-latin-300.woff2') format('woff2'),
        /* Chrome 26+, Opera 23+, Firefox 39+ */
        url('./../fonts/inter-v12-latin-300.woff') format('woff');
      /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
    }

    @font-face {
      font-family: 'Inter';
      font-style: normal;
      font-weight: 500;
      font-display: swap;
      src: local(''),
        url('./fonts/inter-v12-latin-500.woff2') format('woff2'),
        /* Chrome 26+, Opera 23+, Firefox 39+ */
        url('./fonts/inter-v12-latin-500.woff') format('woff');
      /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
    }

    @font-face {
      font-family: 'Inter';
      font-style: normal;
      font-weight: 700;
      font-display: swap;
      src: local(''),
        url('./fonts/inter-v12-latin-700.woff2') format('woff2'),
        /* Chrome 26+, Opera 23+, Firefox 39+ */
        url('./fonts/inter-v12-latin-700.woff') format('woff');
      /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
    }
  </style>

</head>

<body data-bs-spy="scroll" data-bs-target="#navScroll">

  <nav id="navScroll" class="navbar navbar-expand-lg navbar-light fixed-top" tabindex="0">
    <div class="container">
      <a class="navbar-brand pe-4 fs-4" href="/">
      <img src=" {{ asset('assets/img/logoo.png')}}" class="img-fluid">
          <path
            d="M8.235 1.559a.5.5 0 0 0-.47 0l-7.5 4a.5.5 0 0 0 0 .882L3.188 8 .264 9.559a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882L12.813 8l2.922-1.559a.5.5 0 0 0 0-.882l-7.5-4zM8 9.433 1.562 6 8 2.567 14.438 6 8 9.433z" />
        </svg>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('welcome') }}#services" aria-label="Brings you to the frontpage">
              Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('konsultasi') }}">
              Konsultasi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">
              login
            </a>
          </li>

        </ul>

      </div>
    </div>
  </nav>

  <main>
    <div class="w-100 overflow-hidden bg-gray-100" id="top">



    </div>

    <div class="py-vh-5 w-100 overflow-hidden" id="services">
      <div class="container">
        <div class="row d-flex justify-content-end">
          <div class="col-lg-8" data-aos="fade-down">
            <h2 class="display-6">Daftar Diri.</h2>
          </div>
        </div>
        <form action="{{ route('konsultasi-post') }}" method="POST">
        @csrf
        <div class="row d-flex align-items-center">
            <div class="col-md-6 col-lg-4 py-vh-4 pb-0" data-aos="fade-up" data-aos-delay="200">
                <label for="">Tanggal</label>
                <input type="date" class="form-control" value="{{ now()->toDateString() }}" name="tgl" readonly>
            </div>

            <div class="col-md-6 col-lg-4 py-vh-4 pb-0" data-aos="fade-up" data-aos-delay="400">
              <label for="">Nama Lengkap Anak</label>
              <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Lengkap">
            </div>

           <div class="col-md-6 col-lg-4 py-vh-4 pb-0" data-aos="fade-up" data-aos-delay="400">
                                <label for="exampleFormControlSelect1">Usia Anak</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="kode_pengetahuan">
                                </select>
                            </div>

          <div class="col-md-6 col-lg-4 py-vh-5 pb-0" data-aos="fade-up" data-aos-delay="600">
            <button type="submit" class="btn btn-primary ">Lanjutkan Konsultasi </button>

            </div>
        </div>
        </form>

      </div>
    </div>


  </main>

  <footer>
    <div class="container small border-top">
      <div class="row py-5 d-flex justify-content-between">
        
          <address class="text-center mt-3">
            <strong>2019-Politeknik Negeri Jember</strong><br>
        </div>

    <div class="container text-center py-3 small">Made by <a href="https://templatedeck.com" class="link-fancy"
        target="_blank">templatedeck.com</a> Distributed By <a href="https://themewagon.com">ThemeWagon</a>
    </div>
  </footer>

  <script src="{{ asset('') }}frontend/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('') }}frontend/js/aos.js"></script>
  <script>
    AOS.init({
      duration: 800, // values from 0 to 3000, with step 50ms
    });
  </script>

  <script>
    let scrollpos = window.scrollY;
    const header = document.querySelector(".navbar");
    const header_height = header.offsetHeight;

    const add_class_on_scroll = () => header.classList.add("scrolled", "shadow-sm");
    const remove_class_on_scroll = () => header.classList.remove("scrolled", "shadow-sm");

    window.addEventListener('scroll', function () {
      scrollpos = window.scrollY;

      if (scrollpos >= header_height) { add_class_on_scroll(); }
      else { remove_class_on_scroll(); }

      console.log(scrollpos);
    })
  </script>

</body>

</html>
