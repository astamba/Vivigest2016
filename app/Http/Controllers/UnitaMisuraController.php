<?php

namespace App\Http\Controllers;

use App\GruppiCliFor;
use App\UnitaMisura;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Validator;

class UnitaMisuraController extends Controller
{
    //
    function index(){
        $ums = UnitaMisura::all();

        return view('unitamisura.index', ['ums' => $ums]);
    }

    public function show($codice){
        $um = DB::table('unitamisura')->where('Codice', $codice)->first();

        return view('unitamisura.delete', ['um' => $um]);
    }

    public function edit($codice){
        $um = UnitaMisura::find($codice);

        return view('unitamisura.edit', ['um' => $um]);
    }

    public function destroy($codice){
        DB::delete("delete from unitamisura WHERE Codice='$codice'");

        return redirect()->action("UnitaMisuraController@index");
    }

    public function create(){
        return view('unitamisura.create');
    }

    public function store(Request $request){
        //Validazione della richiesta

        $validator = Validator::make($request->all(), [
            'Codice' => 'required|unique:unitamisura|max:2',
            'Descrizione' => 'required|max:50',
        ]);

        if ($validator->fails()) {
            return redirect('unitamisura/create')
                ->withErrors($validator)
                ->withInput();
        }

        $um = new UnitaMisura();
        $um->Codice = $request->Codice;
        $um->Descrizione = $request->Descrizione;
        $um->IsDim1 = $request->IsDim1==null ? false : ($request->IsDim1 == 'on' ? true : false);
        $um->IsDim2 = $request->IsDim2==null ? false : ($request->IsDim2 == 'on' ? true : false);
        $um->IsDim3 = $request->IsDim3==null ? false : ($request->IsDim3 == 'on' ? true : false);
        $um->DescrizioneDim1 = $request->DescrizioneDim1;
        $um->DescrizioneDim2 = $request->DescrizioneDim2;
        $um->DescrizioneDim3 = $request->DescrizioneDim3;

        $um->save();

        return redirect()->action("UnitaMisuraController@index");
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            'Codice' => 'required|max:2',
            'Descrizione' => 'required|max:50',
        ]);

        if ($validator->fails()) {
            return redirect('unitamisura/' . $request->Codice . '/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $um = UnitaMisura::find($request->Codice);

        $um->Descrizione = $request->Descrizione;
        $um->IsDim1 = $request->IsDim1==null ? false : ($request->IsDim1 == 'on' ? true : false);
        $um->IsDim2 = $request->IsDim2==null ? false : ($request->IsDim2 == 'on' ? true : false);
        $um->IsDim3 = $request->IsDim3==null ? false : ($request->IsDim3 == 'on' ? true : false);
        $um->DescrizioneDim1 = $request->DescrizioneDim1;
        $um->DescrizioneDim2 = $request->DescrizioneDim2;
        $um->DescrizioneDim3 = $request->DescrizioneDim3;

        $um->save();

        return redirect()->action("UnitaMisuraController@index");
    }
}
