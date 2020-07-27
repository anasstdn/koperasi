<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnggotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_profile')->nullable();
            $table->date('tgl_bergabung')->nullable();
            $table->string('flag_keaktifan',1)->default('Y')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
            $table->foreign('id_profile')->references('id')->on('profile')->onUpdate('CASCADE')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggota');
    }
}
