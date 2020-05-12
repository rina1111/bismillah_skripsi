<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training', function (Blueprint $table) {
                  $table->bigIncrements('id');
                  $table->integer('nim')->unique();
                  $table->string('nama');
                  $table->string('fakultas');
                  $table->string('jurusan');
                  $table->integer('semester');
                  $table->integer('jml_saudara');
                  $table->decimal('rerata_rapor');
                  $table->decimal('rerata_un');
                  $table->string('nama_ayah');
                  $table->integer('status_ayah');
                  $table->double('pekerjaan_ayah');
                  $table->double('penghasilan_ayah');
                  $table->string('nama_ibu');
                  $table->integer('status_ibu');
                  $table->string('pekerjaan_ibu');
                  $table->string('penghasilan_ibu');
                  $table->double('pbb');
                  $table->double('rekening_listrik');
                  $table->integer('sktm');
                  $table->integer('status_beasiswa');
              
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('training');
    }
}
