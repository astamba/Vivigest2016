<?php

namespace App\Http\Controllers;

use App\AliquoteIva;
use App\Anagrafe;
use App\AnagrafeContatti;
use App\Clienti;
use App\Contatti;
use App\GruppiCliFor;
use App\Pagamenti;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Validator;

class ClientiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clienti = DB::table('anagrafe')->where('Tipo', 'C')->orderBy('RagioneSociale', 'asc')->get();

        return view('clienti.index', ['clienti' => $clienti]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aliquote = AliquoteIva::all();
        $gruppi = GruppiCliFor::all();
        $pagamenti = Pagamenti::all();

        $arrAliquote = [' ' => ' '];
        foreach ($aliquote as $aliquota){
            $arrAliquote = array_add($arrAliquote, $aliquota->Codice , $aliquota->Descrizione);
        }

        $arrGruppi = [' ' => ' '];
        foreach ($gruppi as $gruppo){
            $arrGruppi = array_add($arrGruppi, $gruppo->Codice, $gruppo->Descrizione);
        }

        $arrPagamenti = [' ' => ' '];
        foreach ($pagamenti as $pagamento){
            $arrPagamenti = array_add($arrPagamenti, $pagamento->Codice, $pagamento->Descrizione);
        }

        $arrNewCode = DB::table('anagrafe')->where('Tipo', 'C')->max('Codice');
        $newCode = 'C' . str_pad(strval(intval(substr($arrNewCode, 1))+1), 5, '0', STR_PAD_LEFT);

        $cliente = new Anagrafe();
        $cliente->Codice = $newCode;

        return view('clienti.create', [
            'arrAliquote' => $arrAliquote,
            'arrGruppi' => $arrGruppi,
            'arrPagamenti' => $arrPagamenti,
            'cliente' => $cliente]);
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
            'Codice' => 'required|max:6',
            'RagioneSociale' => 'required|max:200',
            'Indirizzo' => 'max:100',
            'Cap' => 'max:5',
            'Localita' => 'max:100',
            'Provincia' => 'max:2',
            'PartitaIva' => 'max:11',
            'CodiceFiscale' => 'max:16',
            'Telefono' => 'max:50',
            'Fax' => 'max:50',
            'Cellulare' => 'max:50',
            'EMail' => 'max:100',
            'EMail2' => 'max:100',
            'SitoWeb' => 'max:150',
            'AliquotaIva' => 'max:4',
            'AbiCab' => 'max:10',
            'CodicePagamento' => 'max:4',
            'Iban' => 'max:27',
        ]);

        if ($validator->fails()) {
            return redirect('clienti/create')
                ->withErrors($validator)
                ->withInput();
        }

        $cliente = new Anagrafe();
        $cliente->Codice = $request->Codice;
        $cliente->RagioneSociale = $request->RagioneSociale;
        $cliente->Indirizzo = $request->Indirizzo;
        $cliente->Cap = $request->Cap;
        $cliente->Localita = $request->Localita;
        $cliente->Provincia = $request->Provincia;
        $cliente->Gruppo = $request->Gruppo;
        $cliente->PartitaIva = $request->PartitaIva;
        $cliente->CodiceFiscale = $request->CodiceFiscale;
        $cliente->Telefono = $request->Telefono;
        $cliente->Fax = $request->Fax;
        $cliente->Cellulare = $request->Cellulare;
        $cliente->EMail = $request->EMail;
        $cliente->EMail2 = $request->EMail2;
        $cliente->AliquotaIva = $request->AliquotaIva;
        $cliente->Sconto = $request->Sconto;
        $cliente->AbiCab = $request->AbiCab;
        $cliente->CodicePagamento = $request->CodicePagamento;
        $cliente->DichEsenzione = $request->DichEsenzione;
        $cliente->Iban = $request->Iban;
        $cliente->Tipo = $request->Tipo;
        $cliente->RitenutaAccontoAttiva = $request->RitenutaAccontoAttiva;
        $cliente->Tipo = 'C';

        $cliente->save();

        return redirect()->action("ClientiController@index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($codice)
    {
        $aliquote = AliquoteIva::all();
        $gruppi = GruppiCliFor::all();
        $pagamenti = Pagamenti::all();

        $arrAliquote = [' ' => ' '];
        foreach ($aliquote as $aliquota){
            $arrAliquote = array_add($arrAliquote, $aliquota->Codice , $aliquota->Descrizione);
        }

        $arrGruppi = [' ' => ' '];
        foreach ($gruppi as $gruppo){
            $arrGruppi = array_add($arrGruppi, $gruppo->Codice, $gruppo->Descrizione);
        }

        $arrPagamenti = [' ' => ' '];
        foreach ($pagamenti as $pagamento){
            $arrPagamenti = array_add($arrPagamenti, $pagamento->Codice, $pagamento->Descrizione);
        }

        $contatti = DB::table('anagrafecontatti')->where('CodiceCliFor', $codice)->get();
        $destinazionidiverse = DB::table('anagrafedestdiv')->where('CodiceCliFor', $codice)->get();

        $cliente = DB::table('anagrafe')->where('Codice', $codice)->first();

        return view('clienti.delete', ['cliente' => $cliente,
                                       'arrAliquote' => $arrAliquote,
                                       'arrGruppi' => $arrGruppi,
                                       'arrPagamenti' => $arrPagamenti,
                                       'contatti' => $contatti,
                                       'destinazioni' => $destinazionidiverse ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $codice
     * @return \Illuminate\Http\Response
     */
    public function edit($codice)
    {
        $cliente = Anagrafe::find($codice);
        $aliquote = AliquoteIva::all();
        $gruppi = GruppiCliFor::all();
        $pagamenti = Pagamenti::all();
        $contatti = DB::table('anagrafecontatti')->where('CodiceCliFor', $codice)->get();
        $destinazionidiverse = DB::table('anagrafedestdiv')->where('CodiceCliFor', $codice)->get();

        //dd($aliquote);

        $arrAliquote = [' ' => ' '];
        foreach ($aliquote as $aliquota){
            $arrAliquote = array_add($arrAliquote, $aliquota->Codice , $aliquota->Descrizione);
        }

        $arrGruppi = [' ' => ' '];
        foreach ($gruppi as $gruppo){
            $arrGruppi = array_add($arrGruppi, $gruppo->Codice, $gruppo->Descrizione);
        }

        $arrPagamenti = [' ' => ' '];
        foreach ($pagamenti as $pagamento){
            $arrPagamenti = array_add($arrPagamenti, $pagamento->Codice, $pagamento->Descrizione);
        }

        return view('clienti.edit', ['cliente' => $cliente,
                                     'arrAliquote' => $arrAliquote,
                                     'arrGruppi' => $arrGruppi,
                                     'arrPagamenti' => $arrPagamenti,
                                     'contatti' => $contatti,
                                     'destinazioni' => $destinazionidiverse ]);
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
            'Codice' => 'required|max:6',
            'RagioneSociale' => 'required|max:200',
            'Indirizzo' => 'max:100',
            'Cap' => 'max:5',
            'Localita' => 'max:100',
            'Provincia' => 'max:2',
            'PartitaIva' => 'max:11',
            'CodiceFiscale' => 'max:16',
            'Telefono' => 'max:50',
            'Fax' => 'max:50',
            'Cellulare' => 'max:50',
            'EMail' => 'max:100',
            'EMail2' => 'max:100',
            'SitoWeb' => 'max:150',
            'AliquotaIva' => 'max:4',
            'AbiCab' => 'max:10',
            'CodicePagamento' => 'max:4',
            'Iban' => 'max:27',

        ]);

        if ($validator->fails()) {
            return redirect('clienti/' . $request->codice . '/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $cliente = Anagrafe::find($request->Codice);
        $cliente->RagioneSociale = $request->RagioneSociale;
        $cliente->Indirizzo = $request->Indirizzo;
        $cliente->Cap = $request->Cap;
        $cliente->Localita = $request->Localita;
        $cliente->Provincia = $request->Provincia;
        $cliente->Gruppo = $request->Gruppo;
        $cliente->PartitaIva = $request->PartitaIva;
        $cliente->CodiceFiscale = $request->CodiceFiscale;
        $cliente->Telefono = $request->Telefono;
        $cliente->Fax = $request->Fax;
        $cliente->Cellulare = $request->Cellulare;
        $cliente->EMail = $request->EMail;
        $cliente->EMail2 = $request->EMail2;
        $cliente->AliquotaIva = $request->AliquotaIva;
        $cliente->Sconto = $request->Sconto;
        $cliente->AbiCab = $request->AbiCab;
        $cliente->CodicePagamento = $request->CodicePagamento;
        $cliente->DichEsenzione = $request->DichEsenzione;
        $cliente->Iban = $request->Iban;
        $cliente->Tipo = $request->Tipo;
        $cliente->RitenutaAccontoAttiva = $request->RitenutaAccontoAttiva;
        $cliente->Tipo = 'C';

        $cliente->save();

        return redirect()->action("ClientiController@index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($codice)
    {
        DB::delete("delete from anagrafe WHERE Codice='$codice'");

        return redirect()->action("ClientiController@index");
    }
}
