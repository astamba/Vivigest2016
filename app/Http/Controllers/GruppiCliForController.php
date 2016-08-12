<?php

namespace App\Http\Controllers;

use App\GruppiCliFor;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Validator;

class GruppiCliForController extends Controller
{
    //
    function index(){
        $gruppi = GruppiCliFor::all();

        return view('gruppiclifor.index', ['gruppi' => $gruppi]);
    }

    public function show($codice){
        $gruppo = DB::table('gruppiclifor')->where('Codice', $codice)->first();

        return view('gruppiclifor.delete', ['gruppo' => $gruppo]);
    }

    public function edit($codice){
        $gruppo = GruppiCliFor::find($codice);

        return view('gruppiclifor.edit', ['gruppo' => $gruppo]);
    }

    public function destroy($codice){
        DB::delete("delete from gruppiclifor WHERE Codice='$codice'");

        return redirect()->action("GruppiCliForController@index");
    }

    public function create(){
        return view('gruppiclifor.create');
    }

    public function store(Request $request){
        //Validazione della richiesta

        $validator = Validator::make($request->all(), [
            'Codice' => 'required|unique:gruppiclifor|max:5',
            'Descrizione' => 'required|max:50',
        ]);

        if ($validator->fails()) {
            return redirect('gruppiclifor/create')
                ->withErrors($validator)
                ->withInput();
        }

        $gruppo = new GruppiCliFor();
        $gruppo->codice = $request->codice;
        $gruppo->descrizione = $request->descrizione;

        $gruppo->save();

        return redirect()->action("GruppiCliForController@index");
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'Codice' => 'required|max:5',
            'Descrizione' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('gruppiclifor/' . $request->Codice . '/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $gruppo = GruppiCliFor::find($request->Codice);
        $gruppo->Descrizione = $request->Descrizione;

        $gruppo->save();

        return redirect()->action("GruppiCliForController@index");
    }
}
