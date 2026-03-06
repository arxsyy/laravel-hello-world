<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['kategori_id'=>1,'kategori_kode'=>'KTG1','kategori_nama'=>'Makanan'],
            ['kategori_id'=>2,'kategori_kode'=>'KTG2','kategori_nama'=>'Minuman'],
            ['kategori_id'=>3,'kategori_kode'=>'KTG3','kategori_nama'=>'Snack'],
            ['kategori_id'=>4,'kategori_kode'=>'KTG4','kategori_nama'=>'Elektronik'],
            ['kategori_id'=>5,'kategori_kode'=>'KTG5','kategori_nama'=>'ATK']
        ];

        DB::table('m_kategori')->insert($data);
    }
}