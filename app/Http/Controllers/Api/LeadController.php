<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    public function store(Request $request){
        $data = $request->all();

        $validator = Validator::make( $data,
            [
                'name' => 'required|min:2|max:255',
                'email' => 'required|email|max:255',
                'message' => 'required|min:10',
            ],
            [
                'name.required' => 'Il nome è un campo obbligatorio',
                'email.required' => 'l\'email è un campo obbligatorio',
                'message.required' => 'Il messaggio è un campo obbligatorio',
                'name.min' => 'Il nome deve contenere almeno :min caratteri',
                'name.max' => 'Il nome non deve essere piu lungo di  :max caratteri',
                'email.email' => 'Indirizzo email non corretto',
                'email.max' => 'l\'email non deve essere piu lunga di :max caratteri',
                'message.min' => 'Il messaggio deve contenere almeno :min caratteri'
            ]
            );

            // Se i controlli falliscono
            if($validator->fails()){
                $success = false;
                $errors = $validator->errors();
                return response()->json(compact('success','errors'));
            }


            $new_lead = new Lead();
            $new_lead->fill($data);
            $new_lead->save();

            Mail::to('mazzillimarco97@gmail.com')->send(new NewContact($new_lead));

            $success =true;
        return response()->json(compact('success'));
    }
}
