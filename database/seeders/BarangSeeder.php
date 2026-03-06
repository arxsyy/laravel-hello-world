<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['barang_id'=>1,'kategori_id'=>1,'supplier_id'=>1,'barang_kode'=>'BRG1','barang_nama'=>'Produk 1','harga_beli'=>5000,'harga_jual'=>7000],
            ['barang_id'=>2,'kategori_id'=>1,'supplier_id'=>2,'barang_kode'=>'BRG2','barang_nama'=>'Produk 2','harga_beli'=>6000,'harga_jual'=>8000],
            ['barang_id'=>3,'kategori_id'=>1,'supplier_id'=>3,'barang_kode'=>'BRG3','barang_nama'=>'Produk 3','harga_beli'=>7000,'harga_jual'=>9000],
            ['barang_id'=>4,'kategori_id'=>2,'supplier_id'=>1,'barang_kode'=>'BRG4','barang_nama'=>'Produk 4','harga_beli'=>8000,'harga_jual'=>10000],
            ['barang_id'=>5,'kategori_id'=>2,'supplier_id'=>2,'barang_kode'=>'BRG5','barang_nama'=>'Produk 5','harga_beli'=>9000,'harga_jual'=>11000],
            ['barang_id'=>6,'kategori_id'=>2,'supplier_id'=>3,'barang_kode'=>'BRG6','barang_nama'=>'Produk 6','harga_beli'=>10000,'harga_jual'=>12000],
            ['barang_id'=>7,'kategori_id'=>3,'supplier_id'=>1,'barang_kode'=>'BRG7','barang_nama'=>'Produk 7','harga_beli'=>11000,'harga_jual'=>13000],
            ['barang_id'=>8,'kategori_id'=>3,'supplier_id'=>2,'barang_kode'=>'BRG8','barang_nama'=>'Produk 8','harga_beli'=>12000,'harga_jual'=>14000],
            ['barang_id'=>9,'kategori_id'=>3,'supplier_id'=>3,'barang_kode'=>'BRG9','barang_nama'=>'Produk 9','harga_beli'=>13000,'harga_jual'=>15000],
            ['barang_id'=>10,'kategori_id'=>4,'supplier_id'=>1,'barang_kode'=>'BRG10','barang_nama'=>'Produk 10','harga_beli'=>14000,'harga_jual'=>16000],
            ['barang_id'=>11,'kategori_id'=>4,'supplier_id'=>2,'barang_kode'=>'BRG11','barang_nama'=>'Produk 11','harga_beli'=>15000,'harga_jual'=>17000],
            ['barang_id'=>12,'kategori_id'=>4,'supplier_id'=>3,'barang_kode'=>'BRG12','barang_nama'=>'Produk 12','harga_beli'=>16000,'harga_jual'=>18000],
            ['barang_id'=>13,'kategori_id'=>5,'supplier_id'=>1,'barang_kode'=>'BRG13','barang_nama'=>'Produk 13','harga_beli'=>17000,'harga_jual'=>19000],
            ['barang_id'=>14,'kategori_id'=>5,'supplier_id'=>2,'barang_kode'=>'BRG14','barang_nama'=>'Produk 14','harga_beli'=>18000,'harga_jual'=>20000],
            ['barang_id'=>15,'kategori_id'=>5,'supplier_id'=>3,'barang_kode'=>'BRG15','barang_nama'=>'Produk 15','harga_beli'=>19000,'harga_jual'=>21000]
        ];

        DB::table('m_barang')->insert($data);
    }
}