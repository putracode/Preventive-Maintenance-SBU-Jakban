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
        Schema::create('kelistrikans', function (Blueprint $table) {
            $table->id();
            $table->string('pop_id');
            $table->string('daya_listrik');
            $table->string('jumlah_phasa');
            $table->string('mcbr');
            $table->string('mcbs');
            $table->string('mcbt');
            $table->string('beban_r');
            $table->string('beban_s');
            $table->string('beban_t');
            $table->string('utilitas_r');
            $table->string('utilitas_s');
            $table->string('utilitas_t');
            $table->string('rata_rata');
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
        Schema::dropIfExists('kelistrikans');
    }
};
