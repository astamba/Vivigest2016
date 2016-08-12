<?php

namespace App\Http\Controllers;

use App\AliquoteIva;
use App\GruppiCliFor;
use App\Pagamenti;
use App\AnagrafeContatti;
use App\Porti;
use App\Anagrafe;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Validator;

class ContattiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contatti = AnagrafeContatti::all();

        return view('contatti.index', ['contatti' => $contatti]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contatti.create');
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
            'Referente' => 'required|max:100',
            'Posizione' => 'max:100',
            'Telefono' => 'max:20',
            'Fax' => 'max:20',
            'EMail' => 'max:100',
            'Cellulare' => 'max:20',
        ]);

        if ($validator->fails()) {
            return redirect('contatti/create?clifor=' . $request->CodiceCliFor)
                ->withErrors($validator)
                ->withInput();
        }

        $contatto = new AnagrafeContatti();
        $contatto->Referente = $request->Referente;
        $contatto->Posizione = $request->Posizione;
        $contatto->Telefono = $request->Telefono;
        $contatto->Fax = $request->Fax;
        $contatto->EMail = $request->EMail;
        $contatto->Cellulare = $request->Cellulare;
        $contatto->CodiceCliFor = $request->CodiceCliFor;

        $contatto->save();

//        $aliquote = AliquoteIva::all();
//        $gruppi = GruppiCliFor::all();
//        $pagamenti = Pagamenti::all();
//        $contatti = DB::table('anagrafecontatti')->where('CodiceCliFor', $contatto->CodiceCliFor)->get();
//        $destinazionidiverse = DB::table('anagrafedestdiv')->where('CodiceCliFor', $contatto->CodiceCliFor)->get();
//
//        //dd($aliquote);
//
//        $arrAliquote = [' ' => ' '];
//        foreach ($aliquote as $aliquota){
//            $arrAliquote = array_add($arrAliquote, $aliquota->Codice , $aliquota->Descrizione);
//        }
//
//        $arrGruppi = [' ' => ' '];
//        foreach ($gruppi as $gruppo){
//            $arrGruppi = array_add($arrGruppi, $gruppo->Codice, $gruppo->Descrizione);
//        }
//
//        $arrPagamenti = [' ' => ' '];
//        foreach ($pagamenti as $pagamento){
//            $arrPagamenti = array_add($arrPagamenti, $pagamento->Codice, $pagamento->Descrizione);
//        }
//
//        $cliente = Anagrafe::find($contatto->CodiceCliFor);
//
//        return view('clienti.edit', ['cliente' => $cliente,
//            'arrAliquote' => $arrAliquote,
//            'arrGruppi' => $arrGruppi,
//            'arrPagamenti' => $arrPagamenti,
//            'contatti' => $contatti,
//            'destinazioni' => $destinazionidiverse ]);
//        //return view('clienti.edit');
        return redirect('clienti/' . $contatto->CodiceCliFor . '/edit');
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contatto = AnagrafeContatti::find($id);

        return view('contatti.edit', ['contatto' => $contatto]);
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
            'Referente' => 'required|max:100',
            'Posizione' => 'max:100',
            'Telefono' => 'max:20',
            'Fax' => 'max:20',
            'EMail' => 'max:100',
            'Cellulare' => 'max:20',
        ]);

        if ($validator->fails()) {
            return redirect('contatti/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $contatto = AnagrafeContatti::find($id);
        $contatto->Referente = $request->Referente;
        $contatto->Posizione = $request->Posizione;
        $contatto->Telefono = $request->Telefono;
        $contatto->Fax = $request->Fax;
        $contatto->EMail = $request->EMail;
        $contatto->Cellulare = $request->Cellulare;
        $contatto->CodiceCliFor = $request->CodiceCliFor;

        $contatto->save();

        return redirect('clienti/' . $contatto->CodiceCliFor . '/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contatto = DB::table('anagrafecontatti')->where('ID', $id)->first();

        return view('contatti.delete', ['contatto' => $contatto]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contatto = DB::table('anagrafecontatti')->where('ID', $id)->first();

        DB::delete("delete from anagrafecontatti WHERE ID=$id");

        return redirect('clienti/' . $contatto->CodiceCliFor . '/edit');
    }
}
