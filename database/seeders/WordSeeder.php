<?php

namespace Database\Seeders;

use App\Models\Element;
use App\Models\Word;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class WordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $elements = Element::all();
        $commonWords = [
            'the',
            'be',
            'to',
            'of',
            'and',
            'a',
            'in',
            'that',
            'have',
            'i',
            'it',
            'for',
            'not',
            'on',
            'with',
            'he',
            'as',
            'you',
            'do',
            'at',
            'this',
            'but',
            'his',
            'by',
            'from',
            'they',
            'we',
            'say',
            'her',
            'she',
            'or',
            'an',
            'will',
            'my',
            'one',
            'all',
            'would',
            'there',
            'their',
            'what',
            'so',
            'up',
            'out',
            'if',
            'about',
            'who',
            'get',
            'which',
            'go',
            'me',
            'when',
            'make',
            'can',
            'like',
            'time',
            'no',
            'just',
            'him',
            'know',
            'take',
            'people',
            'into',
            'year',
            'your',
            'good',
            'some',
            'could',
            'them',
            'see',
            'other',
            'than',
            'then',
            'now',
            'look',
            'only',
            'come',
            'its',
            'over',
            'think',
            'also',
            'back',
            'after',
            'use',
            'two',
            'how',
            'our',
            'work',
            'first',
            'well',
            'way',
            'even',
            'new',
            'want',
            'because',
            'any',
            'these',
            'give',
            'day',
            'most',
            'us'
        ];
        $excludeSymbols = ['–'];
        foreach ($elements as $element) {
            $titleWords = explode(' ', $element->title);
            $summaryWords = explode(' ', strip_tags($element->summary));
            $allWords = array_merge($titleWords, $summaryWords);

            foreach ($allWords as $word) {
                $lowerWord = Str::lower($word);
                $trimedWord = \App\Classes\Word::trim($lowerWord);
                if (!empty($trimedWord)) {
                    if (!in_array($trimedWord, $commonWords) && !in_array($trimedWord, $excludeSymbols)) {
                        if (!Word::whereName($trimedWord)->exists()) {
                            $word = new Word();
                            $word->name = $trimedWord;
                        } else {
                            $word = Word::whereName($trimedWord)->first();
                        }
                        $word->count += 1;
                        $word->save();
                    }
                }
            }
        }
    }
}
