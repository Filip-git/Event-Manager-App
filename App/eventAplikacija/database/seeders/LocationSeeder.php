<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
            'name' => 'Mostar'
        ]);

        DB::table('locations')->insert([
            'name' => 'Čitluk'
        ]);

        DB::table('locations')->insert([
            'name' => 'Čapljina'
        ]);

        DB::table('locations')->insert([
            'name' => 'Ljubuški'
        ]);
    }
}
