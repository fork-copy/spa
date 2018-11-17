<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsageToVocabularies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vocabularies', function (Blueprint $table) {
            $table->text('usage')->after('meaning_in_burmese')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vocabularies', function (Blueprint $table) {
            $table->dropColumn('usage');
        });
    }
}
