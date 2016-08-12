<?php

namespace App\Http\Controllers;

use App\Pagamenti;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Validator;

class PagamentiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagamenti = Pagamenti::all();

        return view('pagamenti.index', ['pagamenti' => $pagamenti]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pagamenti.create');
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
            'Codice' => 'required|unique:pagamenti|max:4',
            'Descrizione' => 'required|max:60',
            'Tipologia' => 'required',
            'DataFrom' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('pagamenti/create')
                ->withErrors($validator)
                ->withInput();
        }

        $pag = new Pagamenti();
        $pag->Codice = $request->Codice;
        $pag->Descrizione = $request->Descrizione;
        $pag->Tipologia = $request->Tipologia;
        $pag->ggFissi1 = $request->ggFissi1;
        $pag->ggFissi2 = $request->ggFissi2;
        $pag->ggFissi3 = $request->ggFissi3;
        $pag->ggPartenza = $request->ggPartenza;
        $pag->ggIntervallo = $request->ggIntervallo;
        $pag->NumScadenze = $request->NumScadenze;
        $pag->DataFrom = $request->DataFrom;
        $pag->PercAcconto = $request->PercAcconto;

        $pag->save();

        return redirect()->action("PagamentiController@index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($codice)
    {
        $pagamento = DB::table('pagamenti')->where('Codice', $codice)->first();

        return view('pagamenti.delete', ['pagamento' => $pagamento]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($codice)
    {
        $pagamento = Pagamenti::find($codice);

        return view('pagamenti.edit', ['pagamento' => $pagamento]);
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
            'Descrizione' => 'required|max:100',
            'Tipologia' => 'required',
            'DataFrom' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('pagamenti/' . $request->Codice . '/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $pag = Pagamenti::find($request->Codice);
        $pag->Descrizione = $request->Descrizione;
        $pag->Tipologia = $request->Tipologia;
        $pag->ggFissi1 = $request->ggFissi1;
        $pag->ggFissi2 = $request->ggFissi2;
        $pag->ggFissi3 = $request->ggFissi3;
        $pag->ggPartenza = $request->ggPartenza;
        $pag->ggIntervallo = $request->ggIntervallo;
        $pag->NumScadenze = $request->NumScadenze;
        $pag->DataFrom = $request->DataFrom;
        $pag->PercAcconto = $request->PercAcconto;

        $pag->save();

        return redirect()->action("PagamentiController@index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($codice)
    {
        DB::delete("delete from pagamenti WHERE Codice='$codice'");

        return redirect()->action("PagamentiController@index");
    }
}
