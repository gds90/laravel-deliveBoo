<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Gateway;

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
        $nonce = /* $request->input('payment_method_nonce'); */ 'fake-valid-nonce';
        $amount = /* $request->input('amount'); */ 12;

        $result = $this->gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            return response()->json(['success' => true, 'transaction_id' => $result->transaction->id]);
        } else {
            return response()->json(['success' => false, 'message' => $result->message]);
        }
    }
}
