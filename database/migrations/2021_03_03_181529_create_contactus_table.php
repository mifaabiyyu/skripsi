<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran_hima', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('npm');
            $table->text('visi');
            $table->text('misi');
            $table->string('departemen1');
            $table->string('departemen2');
            $table->text('alasan_departemen');
            $table->text('alasan_hima');
            $table->string('photo');
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
        Schema::dropIfExists('contactus');
    }
}
