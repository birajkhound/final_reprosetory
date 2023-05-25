<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class WordsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('words_tables', function (Blueprint $table) {
            $table->id('word_id');
            $table->string('word')->unique();
            $table->string('explanation',500)->length(500);  
            $table->string('english');
            $table->string('translate');
            $table->string('keywords')->nullable();
            $table->string('sound')->nullable();
            $table->string('as_soundex');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('words_tables');
    }
}
