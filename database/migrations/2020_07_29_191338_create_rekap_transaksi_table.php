<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRekapTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekap_transaksi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_transaksi',100)->nullable();
            $table->date('tgl_transaksi')->nullable();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->unsignedBigInteger('id_anggota')->nullable();
            $table->double('subtotal_debet',14,2)->nullable();
            $table->double('subtotal_kredit',14,2)->nullable();
            $table->string('flag_verif',1)->default('N')->nullable();
            $table->timestamps();
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreign('id_anggota')->references('id')->on('anggota')->onUpdate('CASCADE')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rekap_transaksi');
    }
}
