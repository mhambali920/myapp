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
        Schema::create('laz_transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('nama_pembayaran');
            $table->text('nama_barang');
            $table->string('sku_barang');
            $table->integer('jumlah_pembayaran');
            $table->string('pernyataan');
            $table->string('nomor_order');
            $table->string('referensi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laz_transactions');
    }
};
