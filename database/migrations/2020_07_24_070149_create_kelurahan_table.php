<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelurahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelurahan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_kecamatan')->nullable();
            $table->string('kode_kelurahan',100)->nullable();
            $table->string('nama_kelurahan',100)->nullable();
            $table->string('kodepos',100)->nullable();
            $table->timestamps();
            $table->foreign('id_kecamatan')->references('id')->on('kecamatan')->onUpdate('CASCADE')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelurahan');
    }
}
