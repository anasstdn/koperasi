<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKecamatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kecamatan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_kabupaten')->nullable();
            $table->string('kode_kecamatan',100)->nullable();
            $table->string('nama_kecamatan',100)->nullable();
            $table->timestamps();
            $table->foreign('id_kabupaten')->references('id')->on('kabupaten')->onUpdate('CASCADE')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kecamatan');
    }
}
