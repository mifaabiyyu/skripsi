<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartemenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Anggota
        Schema::create('anggota', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('jabatan');
            $table->text('deskripsi');
            $table->string('photo');
            $table->timestamps();
        });


        Schema::create('deskripsi_anggota', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul');
            $table->text('deskripsi');
            $table->timestamps();
        });

        Schema::create('jabatan_anggota', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jabatan');
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
        Schema::dropIfExists('departemenkader');
    }
}
