<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Location;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $organizers = User::whereHas('roles', function($q){
            $q->where('role_name', 'Organizator');
        })->get();

        $images = ['/assets/images/listing-01.jpg', '/assets/images/listing-02.jpg', '/assets/images/listing-03.jpg',
         '/assets/images/listing-04.jpg' , '/assets/images/listing-05.jpg', '/assets/images/listing-06.jpg'];
        return [
            'name' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomNumber(3),
            'date' => $this->faker->dateTimeBetween('+1 week', '+1 year'),
            'image' => $images[array_rand($images)],
            'location_id' => Location::all()->random()->id,
            'organizer_id' => $organizers->random()->id
        ];
    }
}
