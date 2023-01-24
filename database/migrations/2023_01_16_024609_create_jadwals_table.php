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
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pop_id')->nullable()->unsigned();
            $table->string('plan');
            $table->string('wo_fsm');
            $table->string('realisasi');
            $table->string('wilayah');
            $table->string('area');
            $table->string('jenis_pm');
            $table->string('kategori_pm');
            // $table->string('nama_pop');
            $table->string('cluster')->default('-');
            $table->string('status');
            $table->text('link_sharepoint');
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
        Schema::dropIfExists('jadwals');
    }
};
