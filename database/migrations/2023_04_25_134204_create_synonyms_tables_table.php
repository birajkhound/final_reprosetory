<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSynonymsTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('synonyms_tables', function (Blueprint $table) {
            $table->id('s_id');
            $table->unsignedBigInteger('word');
            $table->foreign('word')->references('word_id')->on('words_tables');
            $table->unsignedBigInteger('synonym');
            $table->foreign('synonym')->references('word_id')->on('words_tables');
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
        Schema::dropIfExists('synonyms_tables');
    }
}
