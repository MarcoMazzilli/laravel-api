<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request){
        $data = $request->all();

        $validator = Validator::make(
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

        return response()->json($data);
    }
}
