<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_profile')->nullable();
            $table->unsignedBigInteger('id_jabatan')->nullable();
            $table->unsignedBigInteger('id_golongan')->nullable();
            $table->unsignedBigInteger('id_departement')->nullable();
            $table->string('nip',100)->nullable();
            $table->date('tgl_bergabung')->nullable();
            $table->date('tgl_resign')->nullable();
            $table->string('flag_resign',1)->default('N')->nullable();
            $table->timestamps();
            $table->foreign('id_profile')->references('id')->on('profile')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreign('id_jabatan')->references('id')->on('jabatan')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreign('id_golongan')->references('id')->on('golongan')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreign('id_departement')->references('id')->on('departement')->onUpdate('CASCADE')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
}
