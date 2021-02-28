<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSidangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sidangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('ruangan');
            $table->integer('nomor');
            $table->string('agenda');
            $table->string('pihak');
            $table->string('hakim');
            $table->string('pengganti');
            $table->text('photo')->nullable();
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
        Schema::dropIfExists('sidangs');
    }
}
