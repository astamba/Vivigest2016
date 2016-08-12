<?php

namespace App\Http\Controllers;

use App\AliquoteIva;
use App\Porti;
use App\TipologieSpedizione;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Validator;

class PortiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $porti = Porti::all();

        return view('porti.index', ['porti' => $porti]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('porti.create');
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
            'Codice' => 'required|unique:porti|max:3',
            'Descrizione' => 'required|max:50',
        ]);

        if ($validator->fails()) {
            return redirect('porti/create')
                ->withErrors($validator)
                ->withInput();
        }

        $porto = new Porti();
        $porto->Codice = $request->Codice;
        $porto->Descrizione = $request->Descrizione;

        $porto->save();

        return redirect()->action("PortiController@index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($codice)
    {
        $porto = DB::table('porti')->where('Codice', $codice)->first();

        return view('porti.delete', ['porto' => $porto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($codice)
    {
        $porto = Porti::find($codice);

        return view('porti.edit', ['porto' => $porto]);
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
            return redirect('porti/' . $request->codice . '/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $porto = Porti::find($request->Codice);
        $porto->Descrizione = $request->Descrizione;

        $porto->save();

        return redirect()->action("PortiController@index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($codice)
    {
        DB::delete("delete from porti WHERE Codice='$codice'");

        return redirect()->action("PortiController@index");
    }
}
