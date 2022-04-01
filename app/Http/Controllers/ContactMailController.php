<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactMailController extends Controller
{
    public function sendContactMail(Request $request){

        $data = [
            'nome'=>$request->nome,
            'sobrenome'=>$request->sobrenome,
            'email'=>$request->email,
            'empresa'=>$request->empresa,
            'alojamentos'=>$request->alojamentos,
            'localizacao'=>$request->localizacao,
            'tipo'=>$request->tipo,
            'obs'=>$request->obs,
            'assunto'=>$request->assunto,
            'pagina'=>$request->pagina,
            'ip'=>$request->ip()
        ];
        //return new \App\Mail\contactForms($data);
        \Illuminate\Support\Facades\Mail::send(new \App\Mail\contactForms($data));
        return back()->with('success', 'Obrigado por nos contactar, em breve lhe responderemos.');

    }
}
