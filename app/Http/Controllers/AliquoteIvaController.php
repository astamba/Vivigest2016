<?php

namespace App\Http\Controllers;

use App\AliquoteIva;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Validator;

class AliquoteIvaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aliquote = AliquoteIva::all();

        return view('aliquoteiva.index', ['aliquote' => $aliquote]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aliquoteiva.create');
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
            'Codice' => 'required|unique:aliquoteiva|max:4',
            'Descrizione' => 'required|max:50',
        ]);

        if ($validator->fails()) {
            return redirect('aliquoteiva/create')
                ->withErrors($validator)
                ->withInput();
        }

        $aliquota = new AliquoteIva();
        $aliquota->Codice = $request->Codice;
        $aliquota->Descrizione = $request->Descrizione;
        $aliquota->Aliquota = $request->Aliquota;
        $aliquota->Esenzione = $request->Esenzione==null ? false : ($request->Esenzione == 'on' ? true : false);
        $aliquota->DescrizioneEstesa = $request->DescrizioneEstesa;

        $aliquota->save();

        return redirect()->action("AliquoteIvaController@index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($codice)
    {
        $aliquota = DB::table('aliquoteiva')->where('Codice', $codice)->first();

        return view('aliquoteiva.delete', ['aliquota' => $aliquota]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($codice)
    {
        $aliquota = AliquoteIva::find($codice);

        return view('aliquoteiva.edit', ['aliquota' => $aliquota]);
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
            'Codice' => 'required|max:4',
            'Descrizione' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('aliquoteiva/' . $request->codice . '/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $aliquota = AliquoteIva::find($request->Codice);
        $aliquota->Descrizione = $request->Descrizione;
        $aliquota->Aliquota = $request->Aliquota;
        $aliquota->Esenzione = $request->Esenzione==null ? false : ($request->Esenzione == 'on' ? true : false);
        $aliquota->DescrizioneEstesa = $request->DescrizioneEstesa;

        $aliquota->save();

        return redirect()->action("AliquoteIvaController@index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($codice)
    {
        DB::delete("delete from aliquoteiva WHERE Codice='$codice'");

        return redirect()->action("AliquoteIvaController@index");
    }
}
