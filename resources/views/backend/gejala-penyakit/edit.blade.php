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
                        <form action="{{ route('gejala-penyakit.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                              <label for="exampleInputEmail1">Kode Gejala</label>
                              <input type="text" name="kode" class="form-control @error('kode') is-invalid @enderror" value="{{ old('kode',$data->kode_gejala) }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kode : G001">
                              <small id="emailHelp" class="form-text text-muted">Kode dimulai dengan G0.</small>
                                @error('kode')
                                    <div class="invalid-feedback">
                                        {{$message}}.
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Kode Pengetahuan</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="kode_pengetahuan">
                                  @foreach ($kategori as $item)
                                      <option {{ old('kode',$data->id) == $item->id }} value="{{ $item->id }}">{{ ucwords($item->kode_pengetahuan) }}  || {{ ucwords($item->keterangan_usia) }}</option>
                                  @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Nama Gejala</label>
                              <input type="text" name="nama_gejala" value="{{ old('kode',$data->nama_gejala) }}" class="form-control @error('nama_gejala') is-invalid @enderror" id="exampleInputPassword1" placeholder="Nama Gejala">
                                @error('nama_gejala')
                                    <div class="invalid-feedback">
                                        {{$message}}.
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Keterangan</label>
                                <input type="text" name="ket" value="{{ old('kode',$data->ket) }}" class="form-control @error('ket') is-invalid @enderror" id="exampleInputPassword1" placeholder="Keterangan">
                                  @error('ket')
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
