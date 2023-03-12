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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    .form-wizard {
        display: none;
    }
    .form-wizard.active {
        display: block;
    }
    .btn-default{
        border: 1px solid gray !important;
    }
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
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-layers-half"
          viewbox="0 0 16 16">
          <path
            d="M8.235 1.559a.5.5 0 0 0-.47 0l-7.5 4a.5.5 0 0 0 0 .882L3.188 8 .264 9.559a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882L12.813 8l2.922-1.559a.5.5 0 0 0 0-.882l-7.5-4zM8 9.433 1.562 6 8 2.567 14.438 6 8 9.433z" />
        </svg>
        <span class="ms-1 fw-bolder">Stride</span>
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


        </ul>

      </div>
    </div>
  </nav>

  <main>
    <div class="w-100 overflow-hidden bg-gray-100" id="top">



    </div>

    <div class="py-vh-5 w-100 overflow-hidden" id="services">
      <div class="container-fluid">
        <div class="row d-flex justify-content-center mb-4">
          <div class="col-lg-8" data-aos="fade-down">
            <h2 class="display-6">List Pertanyaan.</h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label for="">Tanggal</label>
                <input type="text" class="form-control" value="{{ $pasien->tanggal }}" readonly>
            </div>
            <div class="col-md-6">
                <label for="">Nama</label>
                <input type="text" class="form-control" value="{{ $pasien->nama_pasien }}" readonly>
            </div>
        </div>
        </div>
            <div class="row d-flex align-items-center">
                <div class="contents order-2 order-md-2">
                    <form action="{{ route('list-pertanyaan.post') }}" method="POST">
                        @csrf
                        <input type="text" value="{{ $pasien->id }}" name="id_pasien">
                        <input type="text" id="jumlahData" name="jumlahData" hidden value="{{ count($chunks)}}">
                        @foreach($chunks as $key => $chunk)

                            <div class="form-wizard {{ $key == 0 ? 'active' : '' }}" data-index='{{ $key+1 }}'>
                                @foreach($chunk as $item)
                                    <input type="text" id="id" name="id[]" hidden value="{{ $item->id }}">
                                    <input type="text" id="id" name="id[]"  value="{{ Session::get('nama_user') }}">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h5 class="card-text">{{ $item->nama_gejala }}</h5>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-check form-check-inline mb-3">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="0" name="kondisi[{{ $item->kode_gejala }}-{{ $item->basis->kode_pengetahuan }}]">
                                                        <label class="form-check-label" for="inlineCheckbox1">tidak</label>
                                                    </div>
                                                    <div class="form-check form-check-inline mb-3">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="0.2" name="kondisi[{{ $item->kode_gejala }}-{{ $item->basis->kode_pengetahuan }}]">
                                                        <label class="form-check-label" for="inlineCheckbox2">Tidak Tahu / Tidak yakin</label>
                                                    </div>
                                                    <div class="form-check form-check-inline mb-3">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="0.4" name="kondisi[{{ $item->kode_gejala }}-{{ $item->basis->kode_pengetahuan }}]">
                                                        <label class="form-check-label" for="inlineCheckbox2">Mungkin</label>
                                                    </div>
                                                    <div class="form-check form-check-inline mb-3">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="0.6" name="kondisi[{{ $item->kode_gejala }}-{{ $item->basis->kode_pengetahuan }}]">
                                                        <label class="form-check-label" for="inlineCheckbox2">Kemungkinan Besar</label>
                                                    </div>

                                                    <div class="form-check form-check-inline mb-3">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="0.8" name="kondisi[{{ $item->kode_gejala }}-{{ $item->basis->kode_pengetahuan }}]">
                                                        <label class="form-check-label" for="inlineCheckbox2">Hampir Pasti</label>
                                                    </div>
                                                    <div class="form-check form-check-inline mb-3">
                                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="1" name="kondisi[{{ $item->kode_gejala }}-{{ $item->basis->kode_pengetahuan }}]">
                                                        <label class="form-check-label" for="inlineCheckbox2">Pasti</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                        <div class="card">
                            <div class="card-footer">
                                <div class="row form-group p-3">
                                    <div class="col text-right">
                                        <button class="btn btn-default btn-prev"><span class="fa fa-chevron-left"></span> Sebelumnya</button>
                                        <button class="btn btn-danger btn-next">Selanjutnya <span class="fa fa-chevron-right"></span></button>
                                        <button type="submit" class="btn btn-primary btn-simpan" id="submit">Simpan <span
                                                class="fa fa-save"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <input type="hidden" name="progress" class="progress">

                </div>
            </div>


      </div>
    </div>


  </main>

  <footer>
    <div class="container small border-top">
      <div class="row py-5 d-flex justify-content-between">

        <div class="col-12 col-lg-6 col-xl-3 border-end p-5">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-layers-half"
            viewbox="0 0 16 16">
            <path
              d="M8.235 1.559a.5.5 0 0 0-.47 0l-7.5 4a.5.5 0 0 0 0 .882L3.188 8 .264 9.559a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882L12.813 8l2.922-1.559a.5.5 0 0 0 0-.882l-7.5-4zM8 9.433 1.562 6 8 2.567 14.438 6 8 9.433z" />
          </svg>
          <address class="text-secondary mt-3">
            <strong>Stride, Inc.</strong><br>
            1355 Market St, Suite 900<br>
            San Francisco, CA 94103<br>
            <abbr title="Phone">P:</abbr>
            (123) 456-7890
          </address>
        </div>
        <div class="col-12 col-lg-6 col-xl-3 border-end p-5">
          <h3 class="h6 mb-3">Company</h3>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link link-secondary ps-0" aria-current="page" href="#">Lorem ipsum</a>
            </li>
            <li class="nav-item">
              <a class="nav-link link-secondary ps-0" href="#">Dolor sitam est</a>
            </li>
            <li class="nav-item">
              <a class="nav-link link-secondary ps-0" href="#">Sed odio cras</a>
            </li>
            <li class="nav-item">
              <a class="nav-link link-secondary ps-0" href="#">Commodo tortor ac</a>
            </li>
          </ul>
        </div>
        <div class="col-12 col-lg-6 col-xl-3 border-end p-5">
          <h3 class="h6 mb-3">Products</h3>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link link-secondary ps-0" aria-current="page" href="#">Fusce dapibus est</a>
            </li>
            <li class="nav-item">
              <a class="nav-link link-secondary ps-0" href="#">Donec sed dui</a>
            </li>
            <li class="nav-item">
              <a class="nav-link link-secondary ps-0" href="#">Tortor mauris</a>
            </li>
            <li class="nav-item">
              <a class="nav-link link-secondary ps-0" href="#">Ut fermentum massa</a>
            </li>

            <li class="nav-item">
              <a class="nav-link link-secondary ps-0" href="#">Magna mollis</a>
            </li>
          </ul>
        </div>
        <div class="col-12 col-lg-6 col-xl-3 p-5">
          <h3 class="h6 mb-3">Subpages</h3>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link link-secondary ps-0" aria-current="page" href="404.html">404 System Page</a>
              <a class="nav-link link-secondary ps-0" aria-current="page" href="register.html">Register System Page</a>
              <a class="nav-link link-secondary ps-0" aria-current="page" href="content.html">Simple Text Content
                Page</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container text-center py-3 small">Made by <a href="https://templatedeck.com" class="link-fancy"
        target="_blank">templatedeck.com</a> Distributed By <a href="https://themewagon.com">ThemeWagon</a>
    </div>
  </footer>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="{{ asset('') }}frontend/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('') }}frontend/js/aos.js"></script>

  <script>
    $(document).ready(function() {
        var jumlahData = $('#jumlahData').val();
        console.log(jumlahData);
        function cekBtn() {
            var indexNow = $(".form-wizard.active").data('index');
            var prev = parseInt(indexNow) - 1
            var next = parseInt(indexNow) + 1
            $(".btn-prev").hide()
            $(".btn-simpan").hide()

            if ($(".form-wizard[data-index='" + prev + "']").length == 1) {
                $(".btn-prev").show()
            }
            if (parseInt(indexNow) == parseInt(jumlahData)) {
                // $(".btn-next").click(function(e) {
                //     if (parseInt(indexNow) != parseInt(jumlahData)) {
                //         $(".btn-next").show()

                //     }
                // $(".btn-simpan").show()
                // $(".progress").prop('disabled', false);
                $(".btn-simpan").show()
                $(".btn-next").hide()
                    // });
                    // $(".btn-next").show()

            } else {
                $(".btn-next").show()
                $(".btn-simpan").hide()

            }
        }
        cekBtn()
        $(".btn-next").click(function(e) {
            e.preventDefault();
            var indexNow = $(".form-wizard.active").data('index')

            var next = parseInt(indexNow) + 1
                // console.log($(".form-wizard[data-index='"+next+"']").length==1);
                // console.log($(".form-wizard[data-index='"+  +"']"));
            if ($(".form-wizard[data-index='" + next + "']").length == 1) {
                // console.log(indexNow);
                $(".form-wizard").removeClass('active')
                $(".form-wizard[data-index='" + next + "']").addClass('active')
                $(".form-wizard[data-index='" + indexNow + "']").attr('data-done', 'true')
            }

            cekBtn(true)
        })

        $(".btn-prev").click(function(e) {
            event.preventDefault(e);
            var indexNow = $(".form-wizard.active").data('index')
            var prev = parseInt(indexNow) - 1
            if ($(".form-wizard[data-index='" + prev + "']").length == 1) {
                $(".form-wizard").removeClass('active')
                $(".form-wizard[data-index='" + prev + "']").addClass('active')
            }
            cekBtn()
            e.preventDefault();
        })
    });
  </script>
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

    //   console.log(scrollpos);
    })
  </script>

</body>

</html>
