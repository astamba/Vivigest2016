<?php

namespace App\Http\Controllers;

use App\GruppiCliFor;
use App\Vettori;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Validator;

class VettoriController extends Controller
{
    //
    function index(){
        $vettori = Vettori::all();

        return view('vettori.index', ['vettori' => $vettori]);
    }

    public function show($codice){
        $vettore = DB::table('vettori')->where('Codice', $codice)->first();

        return view('vettori.delete', ['vettore' => $vettore]);
    }

    public function edit($codice){
        $vettore = Vettori::find($codice);

        return view('vettori.edit', ['vettore' => $vettore]);
    }

    public function destroy($codice){
        DB::delete("delete from vettori WHERE Codice='$codice'");

        return redirect()->action("VettoriController@index");
    }

    public function create(){
        return view('vettori.create');
    }

    public function store(Request $request){
        //Validazione della richiesta

        $validator = Validator::make($request->all(), [
            'Codice' => 'required|unique:gruppiclifor|max:4',
            'Descrizione' => 'required|max:100',
        ]);

        if ($validator->fails()) {
            return redirect('vettori/create')
                ->withErrors($validator)
                ->withInput();
        }

        $vettore = new Vettori();
        $vettore->Codice = $request->Codice;
        $vettore->Descrizione = $request->Descrizione;
        $vettore->Telefono = $request->Telefono;
        $vettore->Fax = $request->Fax;
        $vettore->EMail = $request->EMail;
        $vettore->CodiceFornitore = $request->CodiceFornitore;

        $vettore->save();

        return redirect()->action("VettoriController@index");
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'Codice' => 'required|max:4',
            'Descrizione' => 'required|max:100',
        ]);

        if ($validator->fails()) {
            return redirect('vettori/' . $request->Codice . '/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $vettore = Vettori::find($request->Codice);
        $vettore->Descrizione = $request->Descrizione;
        $vettore->Telefono = $request->Telefono;
        $vettore->Fax = $request->Fax;
        $vettore->EMail = $request->EMail;
        $vettore->CodiceFornitore = $request->CodiceFornitore;

        $vettore->save();

        return redirect()->action("VettoriController@index");
    }
}
