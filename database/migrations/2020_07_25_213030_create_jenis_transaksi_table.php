<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenisTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_transaksi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_kategori_transaksi')->nullable();
            $table->string('jenis_transaksi',100)->nullable();
            $table->string('flag_pemasukan',1)->nullable();
            $table->string('flag_pengeluaran',1)->nullable();
            $table->timestamps();
            $table->foreign('id_kategori_transaksi')->references('id')->on('kategori_transaksi')->onUpdate('CASCADE')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenis_transaksi');
    }
}
