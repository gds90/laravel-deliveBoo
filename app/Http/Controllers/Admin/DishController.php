<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dish;
use App\Models\Category;
use App\Models\Restaurant;
use App\Models\User;
use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id= Auth::id();
        $restaurant= Restaurant::where('user_id', $id )->first();
        $dishes = Dish::where('restaurant_id', $restaurant->id )->get();
        return view('admin.dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.dishes.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDishRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDishRequest $request)
    {

        $user= Auth::user();
        

        // recupero i dati inviati dalla form
        $form_data = $request->all();

        // creo una nuova istanza del modello Dish
        $dish = new Dish();

        // verifico se la richiesta contiene l'immagine 
        if ($request->hasFile('cover_image')) {

            $path = Storage::disk('public')->put('dishes_image', $form_data['cover_image']);

            $form_data['cover_image'] = $path;
        };

        // creo lo slug del piatto
        $slug = Str::slug($form_data['name'], '-');
        $form_data['slug'] = $slug;

       
        if($form_data['visible'] == 'on'){
            $form_data['visible'] = 1;
        }
        else{
            $form_data['visible'] = 0;
        }
        

        // riempio gli altri campi con la funzione fill()
        $dish->fill($form_data);

        $dish->restaurant_id = $user->restaurant->id;

        // salvo il record sul db
        $dish->save();

        // effettuo il redirect alla view index
        return redirect()->route('admin.dishes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        return view('admin.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish ,Request $request)
    {
        $categories = Category::all();
        
        return view('admin.dishes.edit', compact('dish','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDishRequest  $request
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDishRequest $request, Dish $dish)
    {
        

    // Recupera l'utente autenticato
    $user = Auth::user();

    // Verifica se l'utente ha il permesso di modificare questo piatto
    if ($dish->restaurant->user_id !== $user->id) {
        // Se l'utente non è autorizzato, restituisci un errore o reindirizza a una pagina di errore
        return redirect()->route('');
    }

    // recupero i dati inviati dalla form
    $form_data = $request->all();

    // verifico se la richiesta contiene una nuova immagine
    if ($request->hasFile('cover_image')) {
        $path = Storage::disk('public')->put('dishes_image', $form_data['cover_image']);
        $form_data['cover_image'] = $path;

        // Elimina l'immagine precedente se presente
        Storage::disk('public')->delete($dish->cover_image);
    }

    // Aggiorna lo slug del piatto se il nome è stato modificato
    if ($dish->name !== $form_data['name']) {
        $slug = Str::slug($form_data['name'], '-');
        $form_data['slug'] = $slug;
    }

    // Imposta il valore del campo 'visible' in base alla checkbox selezionata
    $form_data['visible'] = $request->has('visible') ? 1 : 0;

    // Aggiorna i campi del piatto con i nuovi dati
    $dish->fill($form_data);

    // salva le modifiche sul db
    $dish->save();

    // effettua il redirect alla view index
    return redirect()->route('admin.dishes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        //
    }
}
