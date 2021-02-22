<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Illuminate\Support\Str;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // Mi creo un Array di tag che voglio inserire nella tabella
      $tags = ["PHP", "Laravel", "Javascript", "VueJs", "HTML", "CSS", "SASS",];

      foreach ($tags as $tag) {
        // Creo una nuova istanza per ogni elemento dell'Array
        $newTag = new Tag();

        // Salvo i dati nella tabella tags compilando tutte le colonne
        $newTag->tag_name = $tag;
        $newTag->tag_slug = Str::slug($tag);

        // Salvo la nuova istanza nel Database
        $newTag->save();
      }
    }
}
