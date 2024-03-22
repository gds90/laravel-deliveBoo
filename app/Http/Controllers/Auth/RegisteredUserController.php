<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
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
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'restaurantName' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string', 'max:100'],
            'p_iva' => ['required', 'string', 'max:11'],
            'cover_image' => ['required'],
        ]);

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

        return redirect(RouteServiceProvider::HOME);
    }
}
