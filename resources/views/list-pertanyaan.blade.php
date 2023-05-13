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

        .btn-default {
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
            <img src=" {{ asset('assets/img/logoo.png') }}" class="img-fluid">
            <path
                d="M8.235 1.559a.5.5 0 0 0-.47 0l-7.5 4a.5.5 0 0 0 0 .882L3.188 8 .264 9.559a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882L12.813 8l2.922-1.559a.5.5 0 0 0 0-.882l-7.5-4zM8 9.433 1.562 6 8 2.567 14.438 6 8 9.433z" />
            </svg>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('welcome') }}#services"
                        aria-label="Brings you to the frontpage">
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

                

                        @if ($pasien->status_usia == 1)
                            <div class="col-md-6">
                                <label for="">Usia</label>
                                <input type="text" class="form-control" value="Usia 1-6 Bulan" readonly>
                            </div>
                        @elseif ($pasien->status_usia == 2)
                            <div class="col-md-6">
                                <label for="">Usia</label>
                                <input type="text" class="form-control" value="Usia 6-10 Bulan" readonly>
                            </div>
                        @elseif ($pasien->status_usia == 3)
                            <div class="col-md-6">
                                <label for="">Usia</label>
                                <input type="text" class="form-control" value="10-11 Bulan" readonly>
                            </div>
                        @elseif ($pasien->status_usia == 4)
                            <div class="col-md-6">
                                <label for="">Usia</label>
                                <input type="text" class="form-control" value="Usia 12-15 Bulan" readonly>
                            </div>
                        @elseif ($pasien->status_usia == 5)
                            <div class="col-md-6">
                                <label for="">Usia</label>
                                <input type="text" class="form-control" value="16-18 Bulan" readonly>
                            </div>
                        @elseif ($pasien->status_usia == 6)
                            <div class="col-md-6">
                                <label for="">Usia</label>
                                <input type="text" class="form-control" value="Usia 19-21 Bulan" readonly>
                            </div>
                        @elseif ($pasien->status_usia == 7)
                            <div class="col-md-6">
                                <label for="">Usia</label>
                                <input type="text" class="form-control" value="Usia 22-24 Bulan" readonly>
                            </div>
                        @elseif ($pasien->status_usia == 8)
                            <div class="col-md-6">
                                <label for="">Usia</label>
                                <input type="text" class="form-control" value="Usia 25-30 Bulan" readonly>
                            </div>
                        @elseif ($pasien->status_usia == 9)
                            <div class="col-md-6">
                                <label for="">Usia</label>
                                <input type="text" class="form-control" value="Usia 30-36 Bulan" readonly>
                            </div>
                        @elseif ($pasien->status_usia == 10)
                            <div class="col-md-6">
                                <label for="">Usia</label>
                                <input type="text" class="form-control" value="Usia 3-4 Tahun" readonly>
                            </div>
                        @elseif ($pasien->status_usia == 11)
                            <div class="col-md-6">
                                <label for="">Usia</label>
                                <input type="text" class="form-control" value="Usia 4-5 Tahun" readonly>
                            </div>
                        @elseif ($pasien->status_usia == 12)
                            <div class="col-md-6">
                                <label for="">Usia</label>
                                <input type="text" class="form-control" value="Usia 5-6 Tahun" readonly>
                            </div>
                        @elseif ($pasien->status_usia == 13)
                            <div class="col-md-6">
                                <label for="">Usia</label>
                                <input type="text" class="form-control" value="Usia 6-7 Tahun" readonly>
                            </div>
                        @endif


                    </div>
                </div>
                <div class="row d-flex align-items-center">
                    <div class="contents order-2 order-md-2">
                        <form action="{{ route('list-pertanyaan.post') }}" method="POST">
                            @csrf
                            <input type="text" value="{{ $pasien->id }}" hidden name="id_pasien">
                            <input type="text" id="jumlahData" name="jumlahData" hidden
                                value="{{ count($chunks) }}">
                            @foreach ($chunks as $chunk)
                                @foreach ($chunk as $item)
                                    @if ($pasien->status_usia == $item->kode_basis_pengetahuan)
                                        <input type="text" id="id" name="id[]" hidden
                                            value="{{ $item->id }}">
                                        <input type="text" id="id" name="id[]" hidden
                                            value="{{ Session::get('nama_user') }}">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <h5 class="card-text">{{ $item->nama_gejala }}</h5>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check form-check-inline mb-3">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="inlineCheckbox1" value="0"
                                                                name="kondisi[{{ $item->kode_gejala }}-{{ $item->basis->kode_pengetahuan }}]">
                                                            <label class="form-check-label"
                                                                for="inlineCheckbox1">tidak</label>
                                                        </div>
                                                        <div class="form-check form-check-inline mb-3">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="inlineCheckbox2" value="0.2"
                                                                name="kondisi[{{ $item->kode_gejala }}-{{ $item->basis->kode_pengetahuan }}]">
                                                            <label class="form-check-label"
                                                                for="inlineCheckbox2">Tidak Tahu / Tidak yakin</label>
                                                        </div>
                                                        <div class="form-check form-check-inline mb-3">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="inlineCheckbox2" value="0.4"
                                                                name="kondisi[{{ $item->kode_gejala }}-{{ $item->basis->kode_pengetahuan }}]">
                                                            <label class="form-check-label"
                                                                for="inlineCheckbox2">Mungkin</label>
                                                        </div>
                                                        <div class="form-check form-check-inline mb-3">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="inlineCheckbox2" value="0.6"
                                                                name="kondisi[{{ $item->kode_gejala }}-{{ $item->basis->kode_pengetahuan }}]">
                                                            <label class="form-check-label"
                                                                for="inlineCheckbox2">Kemungkinan Besar</label>
                                                        </div>
                                                        <div class="form-check form-check-inline mb-3">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="inlineCheckbox2" value="0.8"
                                                                name="kondisi[{{ $item->kode_gejala }}-{{ $item->basis->kode_pengetahuan }}]">
                                                            <label class="form-check-label"
                                                                for="inlineCheckbox2">Pasti</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                    </div>
                    @endforeach
                    <div class="card">
                        <div class="card-footer">
                            <div class="row form-group p-3">
                                <div class="col text-right">

                                    <button type="submit" class="btn btn-primary btn-simpan" id="submit">Simpan
                                        <span class="fa fa-save"></span></button>
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

                <address class="text-center mt-3">
                    <strong>2019-Politeknik Negeri Jember</strong><br>
            </div>

        <div class="container text-center py-3 small">Made by <a href="https://templatedeck.com" class="link-fancy"
                target="_blank">templatedeck.com</a> Distributed By <a href="https://themewagon.com">ThemeWagon</a>
        </div>
    </footer>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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

        window.addEventListener('scroll', function() {
            scrollpos = window.scrollY;

            if (scrollpos >= header_height) {
                add_class_on_scroll();
            } else {
                remove_class_on_scroll();
            }

            //   console.log(scrollpos);
        })
    </script>

</body>

</html>
