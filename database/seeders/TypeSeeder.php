<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use Illuminate\Support\Str;



class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'name' => 'Italiano',
                'description' => 'Cucina italiana tradizionale',
            ],
            [
                'name' => 'Giapponese',
                'description' => 'Cucina giapponese autentica',
            ],
            [
                'name' => 'Messicano',
                'description' => 'Cucina messicana piccante e saporita',
            ],
            [
                'name' => 'Cinese',
                'description' => 'Cucina cinese tradizionale',
            ],
            [
                'name' => 'Indiano',
                'description' => 'Cucina indiana speziata',
            ],
            [
                'name' => 'Thailandese',
                'description' => 'Cucina thailandese piccante e aromatica',
            ],
            [
                'name' => 'Americano',
                'description' => 'Cucina americana classica',
            ],
            [
                'name' => 'Francese',
                'description' => 'Cucina francese raffinata',
            ],
            [
                'name' => 'Spagnolo',
                'description' => 'Cucina spagnola ricca di sapori',
            ],
            [
                'name' => 'Brasiliano',
                'description' => 'Cucina brasiliana saporita e colorata',
            ],
            [
                'name' => 'Mediterraneo',
                'description' => 'Cucina mediterranea fresca e leggera',
            ],
            [
                'name' => 'Vegano',
                'description' => 'Cucina vegana senza ingredienti di origine animale',
            ],
            [
                'name' => 'Vegetariano',
                'description' => 'Cucina vegetariana con ingredienti vegetali e latticini',
            ],
        ];

        foreach ($types as $typeInfo) {
            $type = new Type();
            $type->name = $typeInfo['name'];
            $type->description = $typeInfo['description'];
            $type->slug = Str::slug($type->name, '-');

            $type->save();
        }
    }
}
