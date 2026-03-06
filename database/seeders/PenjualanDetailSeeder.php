<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanDetailSeeder extends Seeder
{
    public function run(): void
    {
        $data = [];
        $id = 1;

        for ($penjualan = 1; $penjualan <= 10; $penjualan++) {
            for ($i = 1; $i <= 3; $i++) {
                $data[] = [
                    'detail_id' => $id,
                    'penjualan_id' => $penjualan,
                    'barang_id' => $i,
                    'harga' => 10000,
                    'jumlah' => 1
                ];
                $id++;
            }
        }

        DB::table('t_penjualan_detail')->insert($data);
    }
}