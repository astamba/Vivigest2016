<?php

namespace App\Http\Controllers;

use App\AliquoteIva;
use App\AspettoBeni;
use App\Banche;
use App\GruppiArticoli;
use App\Porti;
use App\TipologieSpedizione;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Validator;

class AspettoBeniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abs = AspettoBeni::all();

        return view('aspettobeni.index', ['abs' => $abs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aspettobeni.create');
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
            'Codice' => 'required|unique:aspettobeni|max:3',
            'Descrizione' => 'required|max:50',
        ]);

        if ($validator->fails()) {
            return redirect('aspettobeni/create')
                ->withErrors($validator, 'aspettobeni')
                ->withInput();
        }

        $ab = new AspettoBeni();
        $ab->Codice = $request->Codice;
        $ab->Descrizione = $request->Descrizione;

        $ab->save();

        return redirect()->action("AspettoBeniController@index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($codice)
    {
        $ab = DB::table('aspettobeni')->where('Codice', $codice)->first();

        return view('aspettobeni.delete', ['ab' => $ab]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($codice)
    {
        $ab = AspettoBeni::find($codice);

        return view('aspettobeni.edit', ['ab' => $ab]);
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
            return redirect('aspettobeni/' . $request->Codice . '/edit')
                ->withErrors($validator, 'aspettobeni')
                ->withInput();
        }

        $ab = AspettoBeni::find($request->Codice);
        $ab->Descrizione = $request->Descrizione;

        $ab->save();

        return redirect()->action("AspettoBeniController@index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($codice)
    {
        DB::delete("delete from aspettobeni WHERE Codice='$codice'");

        return redirect()->action("AspettoBeniController@index");
    }
}
