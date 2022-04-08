<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Tag;


class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // creo i diversi tag che costituiscono le categorie
        $tags = ['grafica', 'art', 'marketing','illustration', 'comunicazione', 'creatività'];

        foreach($tags as $tag) {
            $new_tag = new Tag();
            $new_tag->name = $tag;
            $new_tag-> slug = Str::slug($tag);
            $new_tag->save();

        }
    }
}
