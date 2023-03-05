<?php

namespace Database\Seeders;

use App\Models\BasisPengetahuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BasisPengetahuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $id = [
            'P001',
            'P002',
            'P003',
            'P004',
            'P005',
            'P006',
            'P007',
            'P008',
            'P009',
            'P010',
            'P011',
            'P012',
            'P013',
        ];
        $nama = [
            'Usia 1-6 Bulan',
            'Usia 6-10 Bulan',
            '10-11 Bulan',
            'Usia 12 – 15 Bulan',
            '16-18 Bulan',
            'Usia 19 – 21 Bulan',
            'Usia 22 – 24 Bulan',
            'Usia 25 – 30 Bulan',
            'Usia 30 – 36 Bulan',
            'Usia 3 – 4 tahun',
            'Usia 4-5 Tahun',
            'Usia 5 – 6 Tahun',
            'Usia 6 – 7 Tahun',
        ];
        for ($i=0; $i < count($nama) ; $i++) {
            $newData =  new BasisPengetahuan;
            $newData->kode_pengetahuan = $id[$i];
            $newData->keterangan_usia = $nama[$i];
            $newData->densitas = 1;
            $newData->save();
        }
    }
}
