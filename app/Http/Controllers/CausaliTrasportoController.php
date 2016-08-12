<?php

namespace App\Http\Controllers;

use App\AliquoteIva;
use App\CausaliTrasporto;
use App\GruppiArticoli;
use App\Porti;
use App\TipologieSpedizione;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Validator;

class CausaliTrasportoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $causali = CausaliTrasporto::all();

        return view('causalitrasporto.index', ['causali' => $causali]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('causalitrasporto.create');
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
            'Codice' => 'required|unique:causalitrasporto|max:3',
            'Descrizione' => 'required|max:50',
        ]);

        if ($validator->fails()) {
            return redirect('causalitrasporto/create')
                ->withErrors($validator)
                ->withInput();
        }

        $causale = new CausaliTrasporto();
        $causale->Codice = $request->Codice;
        $causale->Descrizione = $request->Descrizione;

        $causale->save();

        return redirect()->action("CausaliTrasportoController@index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($codice)
    {
        $causale = DB::table('causalitrasporto')->where('Codice', $codice)->first();

        return view('causalitrasporto.delete', ['causale' => $causale]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($codice)
    {
        $causale = CausaliTrasporto::find($codice);

        return view('causalitrasporto.edit', ['causale' => $causale]);
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
            return redirect('causalitrasporto/' . $request->codice . '/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $causale = CausaliTrasporto::find($request->Codice);
        $causale->Descrizione = $request->Descrizione;

        $causale->save();

        return redirect()->action("CausaliTrasportoController@index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($codice)
    {
        DB::delete("delete from causalitrasporto WHERE Codice='$codice'");

        return redirect()->action("CausaliTrasportoController@index");
    }
}
