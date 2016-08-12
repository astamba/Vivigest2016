<?php

namespace App\Http\Controllers;

use App\AliquoteIva;
use App\GruppiArticoli;
use App\Porti;
use App\TipologieSpedizione;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Validator;

class GruppiArticoliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gruppi = GruppiArticoli::all();

        return view('gruppiarticoli.index', ['gruppi' => $gruppi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gruppiarticoli.create');
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
            'Codice' => 'required|unique:gruppiarticoli|max:3',
            'Descrizione' => 'required|max:50',
        ]);

        if ($validator->fails()) {
            return redirect('gruppiarticoli/create')
                ->withErrors($validator)
                ->withInput();
        }

        $gruppo = new GruppiArticoli();
        $gruppo->Codice = $request->Codice;
        $gruppo->Descrizione = $request->Descrizione;

        $gruppo->save();

        return redirect()->action("GruppiArticoliController@index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($codice)
    {
        $gruppo = DB::table('gruppiarticoli')->where('Codice', $codice)->first();

        return view('gruppiarticoli.delete', ['gruppo' => $gruppo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($codice)
    {
        $gruppo = GruppiArticoli::find($codice);

        return view('gruppiarticoli.edit', ['gruppo' => $gruppo]);
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
            'Codice' => 'required|max:3',
            'Descrizione' => 'required|max:50',
        ]);

        if ($validator->fails()) {
            return redirect('gruppiarticoli/' . $request->codice . '/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $gruppo = GruppiArticoli::find($request->Codice);
        $gruppo->Descrizione = $request->Descrizione;

        $gruppo->save();

        return redirect()->action("GruppiArticoliController@index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($codice)
    {
        DB::delete("delete from gruppiarticoli WHERE Codice='$codice'");

        return redirect()->action("GruppiArticoliController@index");
    }
}
