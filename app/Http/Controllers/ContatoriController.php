<?php

namespace App\Http\Controllers;

use App\Contatori;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Validator;

class ContatoriController extends Controller
{
    //
    function index(){
        $contatori = Contatori::all();

        return view('contatori.index', ['contatori' => $contatori]);
    }

    public function show($id){
        $contatore = DB::table('contatori')->where('ID', $id)->first();

        return view('contatori.delete', ['contatore' => $contatore]);
    }

    public function edit($id){
        $contatore = Contatori::find($id);

        return view('contatori.edit', ['contatore' => $contatore]);
    }

    public function destroy($id){
        DB::delete("delete from contatori WHERE ID='$id'");

        return redirect()->action("ContatoriController@index");
    }

    public function create(){
        return view('contatori.create');
    }

    public function store(Request $request){
        //Validazione della richiesta

        $validator = Validator::make($request->all(), [
            'Codice' => 'required|unique:contatori|max:4',
            'Descrizione' => 'required|max:50',
            'Esercizio' => 'required|max4'
        ]);

        if ($validator->fails()) {
            return redirect('contatori/create')
                ->withErrors($validator)
                ->withInput();
        }

        $contatore = new Contatori();
        $contatore->Codice = $request->Codice;
        $contatore->Descrizione = $request->Descrizione;
        $contatore->Esercizio = $request->Esercizio;
        $contatore->Valore = $request->Valore;

        $contatore->save();

        return redirect()->action("ContatoriController@index");
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'Codice' => 'required|unique:contatori|max:4',
            'Descrizione' => 'required|max:50',
            'Esercizio' => 'required|max4'
        ]);

        if ($validator->fails()) {
            return redirect('contatori/' . $request->Codice . '/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $contatore = Contatori::find($request->ID);
        $contatore->Codice = $request->Codice;
        $contatore->Descrizione = $request->Descrizione;
        $contatore->Esercizio = $request->Esercizio;
        $contatore->Valore = $request->Valore;

        $contatore->save();

        return redirect()->action("ContatoriController@index");
    }
}
