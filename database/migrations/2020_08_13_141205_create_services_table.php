<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {            
            $table->id();
            $table->string("nama");
            $table->string("tlp");
            $table->string("tanggal");
            $table->string("tanggal_selesai")->nullable();
            $table->string("jenis");
            $table->string("serial_number");
            $table->string("foto");
            $table->string("keluhan");     
            $table->string("status")->nullable();
            $table->string("solved")->nullable();
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
        Schema::dropIfExists('services');
    }
}
