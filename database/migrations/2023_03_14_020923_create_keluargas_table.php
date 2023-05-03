<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluarga', function (Blueprint $table) {
            $table->id('ktp');
            $table->string('nama', 25);
            $table->enum('jk', ['laki-laki', 'perempuan']);
            $table->string('tempat_lahir', 20);
            $table->date('tanggal_lahir');
            $table->string('alamat', 500);
            $table->integer('hp', false);
        });
    }
    public function down()
    {
        Schema::dropIfExists('keluarga');
    }
};
