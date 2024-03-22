<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use App\Models\Type;

class RestaurantTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Associo  un ristorante a più tipi di tipologia
        $associations = [
            1 => [1], // Ristorante da Dody
            2 => [1], // Trattoria Bella Italia
            3 => [2, 12], // Sushi House
            4 => [7, 11], // Burger King
            5 => [1, 12], // Ristorante del Mare
        ];

        foreach ($associations as $restaurantId => $typeIds) {
            $restaurant = Restaurant::find($restaurantId);
            $restaurant->types()->attach($typeIds);
        }
    }
}
