<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pegawai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('pegawai', function (Blueprint $table) {
         $table->increments('id');
         $table->string('nama_pegawai');
         $table->text('alamat');
         $table->integer('unit_id');
         $table->integer('jabatan_id');
         $table->integer('cuti');
         $table->string('file');
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
        Schema::dropIfExists('pegawai');
    }
}
