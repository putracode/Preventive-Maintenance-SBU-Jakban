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
        Schema::create('improvements', function (Blueprint $table) {
            $table->id();
            $table->string('plan');
            $table->string('wilayah');
            $table->string('area');
            $table->string('dasar_improvement');
            $table->string('jenis_improvement');
            $table->string('kategori_improvement');
            $table->foreignId('pop_id')->nullable()->unsigned();
            $table->string('nam_cpe_pln');
            $table->string('cluster');
            $table->string('status');
            $table->string('realisasi');
            $table->string('link_sharepoint');
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
        Schema::dropIfExists('improvements');
    }
};