<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Gateway;
use App\Models\Dish;
use App\Models\Order;


class PaymentController extends Controller
{
    protected $gateway;

    public function __construct(Gateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function generateClientToken()
    {
        $clientToken = $this->gateway->clientToken()->generate();
        return response()->json(['clientToken' => $clientToken]);
    }

    public function processPayment(Request $request)
    {
        $nonce = $request->input('paymentMethodNonce');

        $cart = $request->input('cart');

        $userData = $request->input('userData');

        // modifiche del carrello
        $amount = 0;

        foreach ($cart as $item) {
            $id = $item['id'];
            $restaurant_id = $item['restaurant_id'];
            $quantity = $item['quantity'];
            $dish_price = Dish::where('restaurant_id', $restaurant_id)->where('id', $id)->value('price');
            if ($dish_price) {
                $amount += (float) $dish_price * $quantity;
            }
        }

        $amount = number_format($amount, 2);

        

        $result = $this->gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            

            $order = Order::create([
                'name' => $userData['name'],
                'surname' => $userData['surname'],
                'delivery_address' => $userData['address'],
                'phone' => $userData['phone'],
                'price'  => $amount,
                'restaurant_id' => $restaurant_id,
            ]);
            
            $order->save();

            foreach ($cart as $item) {
                $dish_id = $item['id'];
                $quantity = $item['quantity']; 
                $order->dishes()->attach($dish_id);
                $order->dishes()->attach($quantity);
            }

            

            return response()->json(['success' => true, 'transaction_id' => $result->transaction->id]);
        } else {
            return response()->json(['success' => false, 'message' => $result->message]);
        }
    }
}
