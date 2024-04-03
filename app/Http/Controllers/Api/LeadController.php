<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Mail\NewContact;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;


class LeadController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request using a validator
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|max:50',
            'surname' => 'required|max:70',
            'email' => 'required|email|max:100',
            'phone' => 'required|max:20',
            'content' => 'required'
        ], $errors = [
            'name.required' => 'Il nome è obbligatorio',
            'name.max' => 'Il nome deve essere lungo al massimo 50 caratteri',
            'surname.required' => 'Il cognome è obbligatorio',
            'surname.max' => 'Il cognome deve essere lungo al massimo 70 caratteri',
            'email.required' => 'L\'e-mail è obbligatoria',
            'email.email' => 'Inserire un indirizzo e-mail valido',
            'email.max' => 'L\'indirizzo e-mail deve essere lungo al massimo 100 caratteri',
            'phone.required' => 'Il numero di telefono è obbligatorio',
            'phone.max' => 'Il numero di telefono deve essere massimo 20 caratteri',
            'content.required' => 'Il messaggio è obbligatorio'
        ]);

        // Check  if validation fails and return an error message
        if ($validator->fails()) {
            return response()->json([
                "error" => $validator->errors(),
                "success" => false,
            ]);
        }

        // if everything is correct create new data from the Lead model and send email
        $new_lead = new Lead();
        $new_lead->fill($data);
        $new_lead->save();

        Mail::to('info@deliveboo.com')->send(new NewContact($new_lead));

        return  response()->json([
            "success" => true
        ]);
    }
}
