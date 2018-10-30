<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVocabulariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vocabularies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('furigana',255);
            $table->string('hiragana',255);
            $table->string('romaji',255);
            $table->text('meaning_in_english');
            $table->text('meaning_in_burmese');
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
        Schema::dropIfExists('vocabularies');
    }
}
