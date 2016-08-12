<?php

namespace App\Http\Controllers;

use App\AbiCab;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Validator;

class AbiCabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function elencojson()
    {
        return view('scripts.elencoabicab');
    }
    public function index()
    {
        $abicabs = DB::table('abicab')->paginate(15);

        return view('abicab.index', ['abicabs' => $abicabs]);
        //return view('abicab.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('abicab.create');
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
            'Codice' => 'required|unique:abicab|max:10',
            'Descrizione' => 'required|max:100',
            'Indirizzo' => 'max:100',
            'Cap' => 'max:5',
            'Localita' => 'max:100',
            'Provincia' => 'max:2'
        ]);

        if ($validator->fails()) {
            return redirect('abicab/create')
                ->withErrors($validator, 'abicab')
                ->withInput();
        }

        $abicab = new AbiCab();
        $abicab->Codice = $request->Codice;
        $abicab->Descrizione = $request->Descrizione;
        $abicab->Indirizzo = $request->Indirizzo;
        $abicab->Cap = $request->Cap;
        $abicab->Localita = $request->Localita;
        $abicab->Provincia = $request->Provincia;

        $abicab->save();

        return redirect()->action("AbiCabController@index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($codice)
    {
        $abicab = DB::table('abicab')->where('Codice', $codice)->first();

        return view('abicab.delete', ['abicab' => $abicab]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($codice)
    {
        $abicab = AbiCab::find($codice);

        return view('abicab.edit', ['abicab' => $abicab]);
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
            'Codice' => 'required|max:10',
            'Descrizione' => 'required|max:100',
            'Indirizzo' => 'max:100',
            'Cap' => 'max:5',
            'Localita' => 'max:100',
            'Provincia' => 'max:2'
        ]);

        if ($validator->fails()) {
            return redirect('abicab/' . $request->Codice . '/edit')
                ->withErrors($validator, 'abicab')
                ->withInput();
        }

        $abicab = AbiCab::find($request->Codice);
        $abicab->Descrizione = $request->Descrizione;
        $abicab->Indirizzo = $request->Indirizzo;
        $abicab->Cap = $request->Cap;
        $abicab->Localita = $request->Localita;
        $abicab->Provincia = $request->Provincia;

        $abicab->save();

        return redirect()->action("AbiCabController@index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($codice)
    {
        DB::delete("delete from abicab WHERE Codice='$codice'");

        return redirect()->action("AbiCabController@index");
    }
}
