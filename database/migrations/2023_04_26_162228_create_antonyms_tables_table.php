<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntonymsTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antonyms_tables', function (Blueprint $table) {
            $table->id('ant_id');
            $table->unsignedBigInteger('word');
            $table->foreign('word')->references('word_id')->on('words_tables');
            $table->unsignedBigInteger('antonym');
            $table->foreign('antonym')->references('word_id')->on('words_tables');
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
        Schema::dropIfExists('antonyms_tables');
    }
}
