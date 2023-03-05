<x-app-layout>
   @section('content')
        <div class="content">
            <div class="py-4 px-3 px-md-4">

                <div class="mb-3 mb-md-4 d-flex justify-content-between">
                    <div class="h3 mb-0 font-weight-bold">Dashboard</div>
                </div>

                <div class="row">


                    <div class="col-md-6 col-xl-4 mb-3 mb-xl-4">
                        <!-- Widget -->
                        <div class="card flex-row align-items-center p-3 p-md-4">
                            <div class="icon icon-lg bg-soft-primary rounded-circle mr-3">
                                <i class="gd-bar-chart icon-text d-inline-block text-primary"></i>
                            </div>
                            <div>
                                <h4 class="lh-1 mb-1">{{ $basis }}</h4>
                                <h6 class="mb-0">Total Basis Pengetahuan</h6>
                            </div>
                            <i class="gd-arrow-up icon-text d-flex text-success ml-auto"></i>
                        </div>
                        <!-- End Widget -->
                    </div>

                    <div class="col-md-6 col-xl-4 mb-3 mb-xl-4">
                        <!-- Widget -->
                        <div class="card flex-row align-items-center p-3 p-md-4">
                            <div class="icon icon-lg bg-soft-secondary rounded-circle mr-3">
                                <i class="gd-wallet icon-text d-inline-block text-secondary"></i>
                            </div>
                            <div>
                                <h4 class="lh-1 mb-1">{{ $gejala }}</h4>
                                <h6 class="mb-0">Total Gejala Penyakit</h6>
                            </div>
                            <i class="gd-arrow-down icon-text d-flex text-danger ml-auto"></i>
                        </div>
                        <!-- End Widget -->
                    </div>

                    <div class="col-md-6 col-xl-4 mb-3 mb-xl-4">
                        <!-- Widget -->
                        <div class="card flex-row align-items-center p-3 p-md-4">
                            <div class="icon icon-lg bg-soft-warning rounded-circle mr-3">
                                <i class="gd-user icon-text d-inline-block text-warning"></i>
                            </div>
                            <div>
                                <h4 class="lh-1 mb-1">{{ $pasien }}</h4>
                                <h6 class="mb-0">Total Pasien</h6>
                            </div>
                            <i class="gd-arrow-up icon-text d-flex text-success ml-auto"></i>
                        </div>
                        <!-- End Widget -->
                    </div>

                </div>

            </div>

            <!-- Footer -->
            <footer class="small p-3 px-md-4 mt-auto">
                <div class="row justify-content-between">

                    <div class="col-lg text-center text-lg-right">
                        &copy; 2019 Politeknik Negeri Jember. All Rights Reserved.
                    </div>
                </div>
            </footer>
            <!-- End Footer -->
        </div>
   @endsection
</x-app-layout>
