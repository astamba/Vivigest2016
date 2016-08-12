<?php

namespace App\Http\Controllers;

use App\AliquoteIva;
use App\Banche;
use App\GruppiArticoli;
use App\Porti;
use App\TipologieSpedizione;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Validator;

class BancheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banche = Banche::all();

        return view('banche.index', ['banche' => $banche]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banche.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validazione della richiesta

        $validator = Validator::make($request->all(), [
            'Codice' => 'required|unique:banche|max:2',
            'Descrizione' => 'required|max:100',
            'Iban' => 'max:27'
        ]);

        if ($validator->fails()) {
            return redirect('banche/create')
                ->withErrors($validator, 'banche')
                ->withInput();
        }

        $banca = new Banche();
        $banca->Codice = $request->Codice;
        $banca->Descrizione = $request->Descrizione;

        $banca->save();

        return redirect()->action("BancheController@index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($codice)
    {
        $banca = DB::table('banche')->where('Codice', $codice)->first();

        return view('banche.delete', ['banca' => $banca]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($codice)
    {
        $banca = Banche::find($codice);

        return view('banche.edit', ['banca' => $banca]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'Codice' => 'required|max:2',
            'Descrizione' => 'required|max:100',
            'Iban' => 'max:27'
        ]);

        if ($validator->fails()) {
            return redirect('banche/' . $request->Codice . '/edit')
                ->withErrors($validator, 'banche')
                ->withInput();
        }

        $banca = Banche::find($request->Codice);
        $banca->Descrizione = $request->Descrizione;

        $banca->save();

        return redirect()->action("BancheController@index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($codice)
    {
        DB::delete("delete from banche WHERE Codice='$codice'");

        return redirect()->action("BancheController@index");
    }
}
