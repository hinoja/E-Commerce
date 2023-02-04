<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class categoriesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Category::create([
            'name'=>'HighTech',
            'slug'=>'HighTech',
         ]);

         Category::create([
            'name'=>'Livres',
            'slug'=>'Livres',
         ]);
         Category::create([
            'name'=>'Meubles',
            'slug'=>'Meubles',
         ]);
         Category::create([
            'name'=>'Nourriture',
            'slug'=>'Nourriture',
         ]);

         Category::create([
            'name'=>'Jeux',
            'slug'=>'Jeux',
         ]);
    }
}
