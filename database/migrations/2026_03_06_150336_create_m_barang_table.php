<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_barang', function (Blueprint $table) {
            $table->id('barang_id');
            $table->unsignedBigInteger('kategori_id')->index(); // relasi ke kategori
            $table->unsignedBigInteger('supplier_id')->index(); // relasi ke supplier
            $table->string('barang_kode',10)->unique();
            $table->string('barang_nama',100);
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->timestamps();

            // foreign key kategori
            $table->foreign('kategori_id')->references('kategori_id')->on('m_kategori');

            // foreign key supplier
            $table->foreign('supplier_id')->references('supplier_id')->on('m_supplier');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_barang');
    }
};
