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
                            <a type="button" class="btn btn-primary mb-2 mr-2 text-white" href="{{ route('basis-pengetahuan.create') }}">
                                <span class="align-middle">Tambah Data</span>
                                <i class="gd-arrow-right icon-text align-middle ml-2"></i>
                            </a>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kode Umur</th>
                                <th scope="col">Usia Perkembangan Anak</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->kode_pengetahuan }}</td>
                                        <td>{{ ucwords($item->keterangan_usia) }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a type="button" href="{{ route('basis-pengetahuan.edit',$item->id) }}" class="btn btn-soft-warning mb-3 mr-3">  <i class="gd-pencil align-middle mr-1"></i> Edit Data</a>
                                                <form action="{{ route('basis-pengetahuan.destroy',$item->id) }}" method="POST" onsubmit="return confirm('Move data to trash? ')">
                                                    @csrf
                                                    @method('delete')
                                                    <button  class="btn btn-soft-danger mb-3 mr-3"><i class="gd-trash align-middle mr-1"></i>Hapus Data</button>
                                                </form>
                                            </div>
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
