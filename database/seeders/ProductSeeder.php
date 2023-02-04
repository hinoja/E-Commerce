<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('products')->create
            ([
                'title' => Str::random(10),
                'subtitle' => Str::random(10),
                'image' => Str::random(8),
                'description' => Str::random(150),
                'price'=>  random_int(1,150),
                    'slug' => Str::random(10),
                'created_at' => now(),
            ])->categories()->attach([
                rand(1,4),
                rand(1,4)
           ]);
    }

}



