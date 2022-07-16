<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Event;

class CategoryEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();

        Event::all()->each(function($event) use ($categories) {
            $event->categories()->attach(
                $categories->random(1)->pluck('id')
            );
        });
    }
}
