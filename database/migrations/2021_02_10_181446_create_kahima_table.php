<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKahimaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kahima', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('jabatan');
            $table->text('deskripsi');
            $table->string('photo');
            $table->timestamps();
        });
        Schema::create('deskripsi_bph', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul');
            $table->text('deskripsi');
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
        Schema::dropIfExists('kahima');
    }
}
