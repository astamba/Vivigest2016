<?php

namespace App\Http\Controllers;

use App\AliquoteIva;
use App\AnagrafeDestDiv;
use App\GruppiCliFor;
use App\Pagamenti;
use App\AnagrafeContatti;
use App\Porti;
use App\Anagrafe;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Validator;

class DestDivController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destdivs = AnagrafeDestDiv::all();

        return view('destdiv.index', ['destdivs' => $destdivs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('destdiv.create');
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
            'Indirizzo' => 'required|max:100',
            'Cap' => 'max:5',
            'Localita' => 'max:100',
            'Provincia' => 'max:2',
            'Telefono' => 'max:20',
            'Fax' => 'max:20',
            'EMail' => 'max:100',
            'CodiceCliFor' => 'required|max:6',
        ]);

        if ($validator->fails()) {
            return redirect('destdiv/create?clifor=' . $request->CodiceCliFor)
                ->withErrors($validator)
                ->withInput();
        }

        $destdiv = new AnagrafeDestDiv();
        $destdiv->Indirizzo = $request->Indirizzo;
        $destdiv->Cap = $request->Cap;
        $destdiv->Localita = $request->Localita;
        $destdiv->Provincia = $request->Provincia;
        $destdiv->Telefono = $request->Telefono;
        $destdiv->Fax = $request->Fax;
        $destdiv->EMail = $request->EMail;
        $destdiv->CodiceCliFor = $request->CodiceCliFor;

        $destdiv->save();

        return redirect('clienti/' . $destdiv->CodiceCliFor . '/edit');
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $destdiv = AnagrafeDestDiv::find($id);

        return view('destdiv.edit', ['destdiv' => $destdiv]);
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
            'Indirizzo' => 'required|max:100',
            'Cap' => 'max:5',
            'Localita' => 'max:100',
            'Provincia' => 'max:2',
            'Telefono' => 'max:20',
            'Fax' => 'max:20',
            'EMail' => 'max:100',
            'CodiceCliFor' => 'required|max:6',
        ]);

        if ($validator->fails()) {
            return redirect('destdiv/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $destdiv = AnagrafeDestDiv::find($id);
        $destdiv->Indirizzo = $request->Indirizzo;
        $destdiv->Cap = $request->Cap;
        $destdiv->Localita = $request->Localita;
        $destdiv->Provincia = $request->Provincia;
        $destdiv->Telefono = $request->Telefono;
        $destdiv->Fax = $request->Fax;
        $destdiv->EMail = $request->EMail;
        $destdiv->CodiceCliFor = $request->CodiceCliFor;

        $destdiv->save();

        return redirect('clienti/' . $destdiv->CodiceCliFor . '/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $destdiv = DB::table('anagrafedestdiv')->where('ID', $id)->first();

        return view('destdiv.delete', ['destdiv' => $destdiv]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destdiv = DB::table('anagrafedestdiv')->where('ID', $id)->first();

        DB::delete("delete from anagrafedestdiv WHERE ID=$id");

        return redirect('clienti/' . $destdiv->CodiceCliFor . '/edit');
    }
}
