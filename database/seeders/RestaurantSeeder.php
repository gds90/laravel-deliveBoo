<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restaurant;
use Illuminate\Support\Str;


class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = [
            [
                'name' => 'Ristorante da Dody',
                'p_iva' => '12345678901',
                'address' => 'Via Garibaldi, 10',
                'cover_image' => 'restaurants_image/ristorante_da_dody.jpg',
                'user_id' => 1, // ID utente registrato
            ],
            [
                'name' => 'Trattoria Bella Italia',
                'p_iva' => '23456789012',
                'address' => 'Corso Vittorio Emanuele, 20',
                'cover_image' => 'restaurants_image/trattoria_bella_italia.jpg',
                'user_id' => 2,
            ],
            [
                'name' => 'Sushi House',
                'p_iva' => '34567890123',
                'address' => 'Via Roma, 30',
                'cover_image' => 'restaurants_image/sushi_house.jpg',
                'user_id' => 3,
            ],
            [
                'name' => 'Burger King',
                'p_iva' => '45678901234',
                'address' => 'Corso Italia, 45',
                'cover_image' => 'restaurants_image/burger_king.jpg',
                'user_id' => 4,
            ],
            [
                'name' => 'Ristorante del Mare',
                'p_iva' => '56789012345',
                'address' => 'Via Rimini, 122',
                'cover_image' => 'restaurants_image/ristorante_del_mare.jpg',
                'user_id' => 5,
            ],
        ];

        foreach ($restaurants as $restaurant) {
            $new_restaurant  = new Restaurant();
            $new_restaurant->slug = Str::slug($restaurant['name'], '-');
            $new_restaurant->fill($restaurant);


            $new_restaurant->save();
        }
    }
}
