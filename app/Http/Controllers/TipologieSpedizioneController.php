<?php

namespace App\Http\Controllers;

use App\AliquoteIva;
use App\TipologieSpedizione;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Validator;

class TipologieSpedizioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tss = TipologieSpedizione::all();

        return view('tipologiespedizione.index', ['tss' => $tss]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipologiespedizione.create');
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
            'Codice' => 'required|unique:tipologiespedizione|max:3',
            'Descrizione' => 'required|max:50',
        ]);

        if ($validator->fails()) {
            return redirect('tipologiespedizione/create')
                ->withErrors($validator)
                ->withInput();
        }

        $ts = new TipologieSpedizione();
        $ts->Codice = $request->Codice;
        $ts->Descrizione = $request->Descrizione;

        $ts->save();

        return redirect()->action("TipologieSpedizioneController@index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($codice)
    {
        $ts = DB::table('tipologiespedizione')->where('Codice', $codice)->first();

        return view('tipologiespedizione.delete', ['ts' => $ts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($codice)
    {
        $ts = TipologieSpedizione::find($codice);

        return view('tipologiespedizione.edit', ['ts' => $ts]);
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
            return redirect('tipologiespedizione/' . $request->codice . '/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $ts = TipologieSpedizione::find($request->Codice);
        $ts->Descrizione = $request->Descrizione;

        $ts->save();

        return redirect()->action("TipologieSpedizioneController@index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($codice)
    {
        DB::delete("delete from tipologiespedizione WHERE Codice='$codice'");

        return redirect()->action("TipologieSpedizioneController@index");
    }
}
