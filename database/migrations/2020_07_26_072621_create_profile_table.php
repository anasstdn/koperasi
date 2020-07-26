<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_depan',100)->nullable();
            $table->string('nama_belakang',100)->nullable();
            $table->string('nik',100)->nullable();
            $table->unsignedBigInteger('id_jenis_kelamin')->nullable();
            $table->unsignedBigInteger('id_agama')->nullable();
            $table->unsignedBigInteger('id_kelurahan_domisili')->nullable();
            $table->unsignedBigInteger('id_kelurahan_ktp')->nullable();
            $table->text('alamat_domisili')->nullable();
            $table->text('alamat_ktp')->nullable();
            $table->string('tempat_lahir',100)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->text('foto')->nullable();
            $table->unsignedBigInteger('id_status_perkawinan')->nullable();

            $table->timestamps();
            $table->foreign('id_jenis_kelamin')->references('id')->on('jenis_kelamin')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreign('id_agama')->references('id')->on('agama')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreign('id_kelurahan_domisili')->references('id')->on('kelurahan')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreign('id_kelurahan_ktp')->references('id')->on('kelurahan')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreign('id_status_perkawinan')->references('id')->on('status_perkawinan')->onUpdate('CASCADE')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile');
    }
}
