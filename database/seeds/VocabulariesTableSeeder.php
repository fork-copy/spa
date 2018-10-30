<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class VocabulariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon\Carbon::now();
        DB::table('vocabularies')->insert(
            [
                'user_id' => 1,
                'furigana' => '満足',
                'hiragana' => 'まんぞく',
                'romaji' => 'Manzoku',
                'meaning_in_english' => 'satisfaction',
                'meaning_in_burmese' => 'ေက်နပ္ျခင္း။ ေက်နပ္မႈ။ အားရျခင္း။',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'user_id' => 1,
                'furigana' => 'ばっちりです！',
                'hiragana' => 'ばっちりです！',
                'romaji' => 'Batchiridesu!',
                'meaning_in_english' => 'It is perfect!',
                'meaning_in_burmese' => 'အပိုုအလိုုမရိွျပည့္စံုုေနတာပဲ။',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'user_id' => 1,
                'furigana' => '今日やること',
                'hiragana' => 'きょやること',
                'romaji' => 'Kyō yaru koto',
                'meaning_in_english' => 'What i will do today',
                'meaning_in_burmese' => 'ဒီေန႔လုုပ္မယ့္အရာေတြ',
                'created_at' => $now,
                'updated_at' => $now
            ]
        );
    }
}
