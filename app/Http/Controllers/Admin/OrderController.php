<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Category;
use App\Models\Restaurant;
use App\Models\User;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use DateTime;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant = Auth::user()->restaurant; // Supponendo che ci sia una relazione tra utente e ristorante
        $orders = Order::orderBy('id', 'desc')->where('restaurant_id', $restaurant->id)->get();
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $form_data = $request->all();

        $order->update($form_data);

        return redirect()->back()->with('success_message', 'Lo stato dell\'ordine è stato aggiornato con successo.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function charts()
    {
        // Recupero l'id del ristorante loggato
        $restaurantId = Auth::user()->restaurant->id;

        // Ottieni tutti i piatti con le relative quantità di ordini
        $orderedDishes = [];
        $dishes = Dish::where('restaurant_id', $restaurantId)->with('orders')->get();

        foreach ($dishes as $dish) {
            $quantity = $dish->orders->sum('pivot.quantity');
            $orderedDishes[$dish->name] = $quantity;
        }

        // Recupero il fatturato mensile per il ristorante loggato
        $monthSales = Order::where('restaurant_id', $restaurantId)
            ->selectRaw('MONTH(created_at) as month, SUM(price) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Costruisco i dati per il grafico del fatturato
        $months = [];
        $sales = [];

        foreach ($monthSales as $sale) {
            $months[] = DateTime::createFromFormat('!m', $sale->month)->format('F');
            $sales[] = $sale->total;
        }

        // Costruisco i dati per il grafico  delle vendite dei piatti
        $labels = array_keys($orderedDishes);
        $quantity = array_values($orderedDishes);

        return view('admin.orders.statistics', compact('labels', 'quantity', 'months', 'sales'));
    }
}
