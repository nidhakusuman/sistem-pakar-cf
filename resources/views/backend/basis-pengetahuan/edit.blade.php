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
                <div class="d-flex justify-content-end mb-4">
                    <button onclick="history.back()" class="btn btn-light mb-2 mr-2"><i class="gd-arrow-left icon-text align-middle mr-2"></i> Kembali</button>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <form action="{{ route('basis-pengetahuan.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                              <label for="exampleInputEmail1">Kode Pengetahuan</label>
                              <input type="text" name="kode" class="form-control @error('kode') is-invalid @enderror" value="{{ old('kode',$data->kode_pengetahuan) }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kode : P001">
                              <small id="emailHelp" class="form-text text-muted">Kode dimulai dengan P00.</small>
                                @error('kode')
                                    <div class="invalid-feedback">
                                        {{$message}}.
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Usia Perkembangan</label>
                              <input type="text" name="usia" class="form-control @error('usia') is-invalid @enderror" value="{{ old('usia',$data->keterangan_usia) }}" id="exampleInputPassword1" placeholder="Usia Perkembangan Anak">
                                @error('usia')
                                    <div class="invalid-feedback">
                                        {{$message}}.
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
