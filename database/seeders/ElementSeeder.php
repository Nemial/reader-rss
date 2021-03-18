<?php

namespace Database\Seeders;

use App\Models\Element;
use Illuminate\Database\Seeder;

class ElementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rss = simplexml_load_file('https://www.theregister.co.uk/software/headlines.atom');

        foreach ($rss->entry as $rssElement) {
            $element = new Element();
            $element->author = $rssElement->author->name->__toString();
            $element->link = $rssElement->link->attributes()->href->__toString();
            $element->title = $rssElement->title->__toString();
            $element->summary = $rssElement->summary->__toString();
            $element->save();
        }
    }
}
