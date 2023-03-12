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
                <canvas id="myChart"></canvas>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Nama Pasien</th>
                                <th scope="col">Kode Penyakit</th>
                                <th>Nilai</th>
                                <th>Persentase Akhir</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($pasien as $item)
                                    @php
                                        $kode_penyakit = \App\Models\HasilPerhitungan::where('nama_pasien',$item->nama_pasien)->get();
                                        $nilai_akhir = \App\Models\HasilPerhitungan::where('nama_pasien',$item->nama_pasien)->max('nilai_akhir');
                                    @endphp
                                        <tr>
                                            <td>{{ $item->nama_pasien }}</td>
                                            <td>
                                                <table class="w-100">
                                                    @foreach ($kode_penyakit as $kodePenyakitItem)
                                                        <tr>
                                                            <td>{{ $kodePenyakitItem->kode_penyakit }}</td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </td>
                                            <td>
                                                <table class="w-100">
                                                    @foreach ($kode_penyakit as $kodePenyakitItem)
                                                        <tr>
                                                            <td>{{ $kodePenyakitItem->nilai_akhir }}</td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </td>
                                            <td>
                                                {{ $nilai_akhir * 100 }} %

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
    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            const ctx = document.getElementById('myChart');
             //options
             var options = {
                    plugins: {
                        legend: {
                            display: true,
                            labels: {
                                color: 'grey'
                            },
                            position: 'bottom'
                        },
                        autocolors: {
                            mode: 'dataset',
                        }
                    }
                };
            const labels = [
                @foreach ($nama_penyakit as $key => $value)
                    '{{ $value->keterangan_usia }}',
                @endforeach
            ];
            const data = {
                labels: labels,
                datasets: [
                        {
                            label: 'Jumlah Data Pasien',
                            data: [
                                @foreach ($count_data as $val )
                                    {{ $val }},
                                @endforeach


                            ]
                        }


                    ]
            };
            new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
            });
        </script>
    @endpush
    @endsection
</x-app-layout>
