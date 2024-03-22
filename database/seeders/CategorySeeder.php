<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Pizza'],
            ['name' => 'Sushi'],
            ['name' => 'Burger'],
            ['name' => 'Pasta'],
            ['name' => 'Pesce'],
        ];

        foreach ($categories as $category) {
            $new_category = new Category();
            $new_category->fill($category);
            $new_category->slug = Str::slug($category['name']);

            $new_category->save();
        }
    }
}
