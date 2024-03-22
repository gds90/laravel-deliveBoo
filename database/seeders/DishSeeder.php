<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dish;
use Illuminate\Support\Str;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dishes = [
            [
                'name' => 'Margherita',
                'cover_image' => 'dishes_image/margherita.jpg',
                'description' => 'Pizza con pomodoro, mozzarella e basilico',
                'price' => 6.50,
                'visible' => true,
                'restaurant_id' => 1, // ID ristorante
                'category_id' => 1, // ID categoria Pizza
            ],
            [
                'name' => 'Americana',
                'cover_image' => 'dishes_image/americana.jpg',
                'description' => 'Pizza con wurstel, mozzarella e patate fritte',
                'price' => 8.50,
                'visible' => true,
                'restaurant_id' => 1, // ID ristorante
                'category_id' => 1, // ID categoria Pizza
            ],
            [
                'name' => 'Sashimi Misto',
                'cover_image' => 'dishes_image/sashimi_misto.jpg',
                'description' => 'Assortimento di pesce crudo fresco',
                'price' => 16.99,
                'visible' => true,
                'restaurant_id' => 3, // ID ristorante
                'category_id' => 2, // ID categoria Sushi
            ],
            [
                'name' => 'Classic Burger',
                'cover_image' => 'dishes_image/classic_burger.jpg',
                'description' => 'Burger con hamburger di manzo, formaggio, lattuga e pomodoro',
                'price' => 11.99,
                'visible' => true,
                'restaurant_id' => 4, // ID ristorante
                'category_id' => 3, // ID categoria Burger
            ],
            [
                'name' => 'Bacon Cheese Burger',
                'cover_image' => 'dishes_image/bacon_cheese_burger.jpg',
                'description' => 'Burger con hamburger di manzo, formaggio, bacon e salsa barbecue',
                'price' => 13.99,
                'visible' => true,
                'restaurant_id' => 4, // ID ristorante
                'category_id' => 3, // ID categoria Burger
            ],
            [
                'name' => 'Spaghetti Carbonara',
                'cover_image' => 'dishes_image/carbonara.jpg',
                'description' => 'Spaghetti conditi con uovo, pancetta, pecorino e pepe nero',
                'price' => 10.50,
                'visible' => true,
                'restaurant_id' => 2, // ID ristorante
                'category_id' => 4, // ID categoria Pasta
            ],
            [
                'name' => 'Linguine alle Vongole',
                'cover_image' => 'dishes_image/linguine_vongole.jpg',
                'description' => 'Linguine serviti con vongole fresche, aglio, prezzemolo e olio d\'oliva',
                'price' => 14.99,
                'visible' => true,
                'restaurant_id' => 5, // ID ristorante
                'category_id' => 4, // ID categoria Pasta
            ],
            [
                'name' => 'Filetto di Salmone',
                'cover_image' => 'dishes_image/filetto_salmone.jpg',
                'description' => 'Filetto di salmone alla griglia servito con contorno di verdure',
                'price' => 16.50,
                'visible' => true,
                'restaurant_id' => 5, // ID ristorante
                'category_id' => 5, // ID categoria Pesce
            ],
            [
                'name' => 'Calamari Fritti',
                'cover_image' => 'dishes_image/calamari_fritti.jpg',
                'description' => 'Anelli di calamaro fritti serviti con salsa aioli',
                'price' => 8.99,
                'visible' => true,
                'restaurant_id' => 5, // ID ristorante
                'category_id' => 5, // ID categoria Pesce
            ],
            [
                'name' => 'Risotto ai Frutti di Mare',
                'cover_image' => 'dishes_image/risotto_frutti_mare.jpg',
                'description' => 'Risotto cremoso con frutti di mare misti',
                'price' => 13.99,
                'visible' => true,
                'restaurant_id' => 5, // ID ristorante  
                'category_id' => 4, // ID categoria Pasta
            ],
        ];

        foreach ($dishes as $dish) {
            $new_dish = new Dish();
            $new_dish->fill($dish);
            $new_dish->slug = Str::slug($dish['name'], '-');

            $new_dish->save();
        }
    }
}
