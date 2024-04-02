<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Restaurant;
use App\Models\Type;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::with('types')->orderBy('name')->get();

        return response()->json([
            'success' => true,
            'results' => $restaurants
        ]);
    }

    public function show($slug)
    {
        // recupero il ristorante attraverso il parametro slug
        $restaurant = Restaurant::with('types', 'dishes.category')->where('slug', $slug)->first();

        // se il ristorante esiste
        if ($restaurant) {
            return response()->json([
                'success' => true,
                'restaurant' => $restaurant
            ]);
        }
        // se il ristorante non esiste
        return response()->json([
            'success' => false
        ]);
    }

    public function get_type_restaurants($slug)
    {
        // cerco la tipologia di ristorante corrispondente allo slug
        $type = Type::where('slug', $slug)->first();

        // recupero i ristoranti che hanno la tipologia scelta
        $restaurants = Restaurant::whereHas('types', function ($query) use ($type) {
            $query->where('id', $type->id);
        })->get();

        return response()->json([
            'success' => true,
            'results' => $restaurants
        ]);
    }
}
