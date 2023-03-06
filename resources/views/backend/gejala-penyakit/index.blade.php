<x-app-layout>
    @section('content')
    <div class="content">
        <div class="py-4 px-3 px-md-4">

            <div class="mb-3 mb-md-4 d-flex justify-content-between">
                <div class="h3 mb-0 font-weight-bold"> <strong> {{ ucwords(str_replace('-', ' ',Request::segment(1))) }}</strong></div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12">
                        @include('components.notification')
                        <div class="d-flex justify-content-end mb-4">
                            <a type="button" class="btn btn-primary mb-2 mr-2 text-white" href="{{ route('gejala-penyakit.create') }}">
                                <span class="align-middle">Tambah Data</span>
                                <i class="gd-arrow-right icon-text align-middle ml-2"></i>
                            </a>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kode Pengetahuan</th>
                                <th scope="col">Kode Gejala</th>
                                <th scope="col">Gejala Penyakit</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($kode_basis as $itemS)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        {{ $itemS->basis->kode_pengetahuan }}
                                    </td>
                                    <td class="p-0 ">
                                        <table class="w-100 p-0 table m-0" style="height: 500px;">
                                            @foreach ($data as $item)
                                                @if ($itemS->basis->kode_pengetahuan === $item->basis->kode_pengetahuan)
                                                    <tr>
                                                        <td class="">
                                                            {{ $item->kode_gejala }}

                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </table>
                                    </td>
                                    <td class="p-0 w-50">
                                        <table class="w-100 p-0 " style="height: 500px;">
                                            @foreach ($data as $item)
                                                @if ($itemS->basis->kode_pengetahuan === $item->basis->kode_pengetahuan)
                                                    <tr>
                                                        <td class="">
                                                            <div style="display: -webkit-box;
                                                                    -webkit-line-clamp: 1;
                                                                    -webkit-box-orient: vertical;
                                                                    overflow: hidden;
                                                                    padding: 4px;
                                                                ">
                                                                {{ $item->nama_gejala }}
                                                            </div>

                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </table>
                                    </td>
                                    <td class="p-0">
                                            @foreach ($data as $item)
                                                @if ($itemS->basis->kode_pengetahuan === $item->basis->kode_pengetahuan)
                                                    <div class="d-flex ">
                                                        <a type="button" href="{{ route('gejala-penyakit.edit',$item->id) }}" class="btn btn-soft-warning mr-3">  <i class="gd-pencil align-middle mr-1"></i> Edit Data</a>
                                                        <form action="{{ route('gejala-penyakit.destroy',$item->id) }}" method="POST" onsubmit="return confirm('Move data to trash? ')">
                                                            @csrf
                                                            @method('delete')
                                                            <button  class="btn btn-soft-danger mr-3"><i class="gd-trash align-middle mr-1"></i>Hapus Data</button>
                                                        </form>
                                                    </div>
                                                    <hr class="m-2">

                                                @endif
                                            @endforeach

                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @endsection
</x-app-layout>
