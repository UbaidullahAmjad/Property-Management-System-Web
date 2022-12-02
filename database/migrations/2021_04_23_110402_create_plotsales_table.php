<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlotsalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plotsales', function (Blueprint $table) {
            $table->id();
            $table->string('sector_no');
            $table->string('plot_no');
            $table->string('size_no');
            $table->string('category');
            $table->integer('price');
            $table->string('phase_no');
            $table->unsignedBigInteger('plot_id');
            $table->foreign('plot_id')->references('id')->on('plots')->onDelete('cascade');
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
        Schema::dropIfExists('plotsales');
    }
}
