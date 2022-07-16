<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Koncerti',
            'icon'=> '/assets/images/search-icon-01.png',
            'description' => 'Opis kategorije Koncerti'
        ]);

        DB::table('categories')->insert([
            'name' => 'Hrana',
            'icon' => '/assets/images/search-icon-02.png',
            'description' => 'Opis kategorije Hrana'
        ]);

        DB::table('categories')->insert([
            'name' => 'Sport',
            'icon' => '/assets/images/search-icon-03.png',
            'description' => 'Opis kategorije Sport'
        ]);

        DB::table('categories')->insert([
            'name' => 'Kupovina',
            'icon' => '/assets/images/search-icon-04.png',
            'description' => 'Opis kategorije Kupovina'
        ]);

        DB::table('categories')->insert([
            'name' => 'Konferencije',
            'icon' => '/assets/images/search-icon-05.png',
            'description' => 'Opis kategorije Konferencije'
        ]);
    }
}
