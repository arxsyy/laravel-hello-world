<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'supplier_id'=>1,
                'supplier_kode'=>'SUP1',
                'supplier_nama'=>'Supplier A',
                'supplier_alamat'=>'Malang',
                'supplier_telp'=>'081111111'
            ],
            [
                'supplier_id'=>2,
                'supplier_kode'=>'SUP2',
                'supplier_nama'=>'Supplier B',
                'supplier_alamat'=>'Surabaya',
                'supplier_telp'=>'082222222'
            ],
            [
                'supplier_id'=>3,
                'supplier_kode'=>'SUP3',
                'supplier_nama'=>'Supplier C',
                'supplier_alamat'=>'Jakarta',
                'supplier_telp'=>'083333333'
            ]
        ];

        DB::table('m_supplier')->insert($data);
    }
}