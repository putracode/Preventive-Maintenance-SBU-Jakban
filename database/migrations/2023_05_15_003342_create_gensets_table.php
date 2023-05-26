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
        Schema::create('gensets', function (Blueprint $table) {
            $table->id();
            $table->string('pop_id');
            $table->string('merk_type');
            $table->string('sn');
            $table->string('daya_listrik');
            $table->string('jumlah_phasa');
            $table->string('kapasitas');
            $table->string('kemampuan_genset');
            $table->string('index_healthy');
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
        Schema::dropIfExists('gensets');
    }
};
