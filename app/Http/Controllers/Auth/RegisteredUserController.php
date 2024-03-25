<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Restaurant;
use App\Models\Type;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $types = Type::all();
        return view('auth.register', compact('types'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $messages = [
            'name.required' => 'Il campo nome è obbligatorio.',
            'email.required' => 'Il campo email è obbligatorio.',
            'email.email' => 'Inserisci un indirizzo email valido.',
            'email.unique' => 'L\'indirizzo email è già stato utilizzato.',
            'password.required' => 'Il campo password è obbligatorio.',
            'password.confirmed' => 'La conferma della password non corrisponde.',
            'restaurantName.required' => 'Il campo nome del ristorante è obbligatorio.',
            'restaurantName.unique' => "Esiste già un ristorante con questo nome",
            'address.required' => 'Il campo indirizzo è obbligatorio.',
            'p_iva.required' => 'Il campo Partita IVA è obbligatorio.',
            'p_iva.size' => 'La Partita IVA deve avere :size caratteri.',
            'cover_image.required' => 'È richiesta un\'immagine di copertina per il ristorante.',
        ];

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'restaurantName' => ['required', 'string', 'max:100', 'unique:restaurants,name'],
            'address' => ['required', 'string', 'max:100'],
            'p_iva' => ['required', 'string', 'size:11'],
            'cover_image' => ['required'],
        ], $messages);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        $user_id = User::where('email', $user->email)->get();
        $user_id = $user_id[0]->id;
        if ($request->hasFile('cover_image')) {

            $path = Storage::disk('public')->put('restaurants_image', $request->cover_image);
        };

        // creo il record del ristorante dell'utente appena registrato
        $restaurant = Restaurant::create([
            'name' => $request->restaurantName,
            'slug' => Str::slug($request->restaurantName, '-'),
            'address' => $request->address,
            'p_iva' => $request->p_iva,
            'cover_image' => $path,
            'user_id' => $user_id
        ]);
        $restaurant->save();

        if ($request->has('type')) {
            $restaurant->types()->attach($request['type']);
        }

        return redirect(RouteServiceProvider::HOME);
    }
}
