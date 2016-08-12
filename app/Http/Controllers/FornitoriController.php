<?php

namespace App\Http\Controllers;

use App\AliquoteIva;
use App\Anagrafe;
use App\Contatti;
use App\GruppiCliFor;
use App\Pagamenti;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Validator;

class FornitoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fornitori = DB::table('anagrafe')->where('Tipo', 'F')->orderBy('RagioneSociale', 'asc')->get();

        return view('fornitori.index', ['fornitori' => $fornitori]);
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

        $arrNewCode = DB::table('anagrafe')->where('Tipo', 'F')->max('Codice');
        $newCode = 'F' . str_pad(strval(intval(substr($arrNewCode, 1))+1), 5, '0', STR_PAD_LEFT);

        $fornitore = new Anagrafe();
        $fornitore->Codice = $newCode;

        return view('fornitori.create', [
            'arrAliquote' => $arrAliquote,
            'arrGruppi' => $arrGruppi,
            'arrPagamenti' => $arrPagamenti,
            'fornitore' => $fornitore]);
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
            return redirect('fornitori/create')
                ->withErrors($validator)
                ->withInput();
        }

        $fornitore = new Anagrafe();
        $fornitore->Codice = $request->Codice;
        $fornitore->RagioneSociale = $request->RagioneSociale;
        $fornitore->Indirizzo = $request->Indirizzo;
        $fornitore->Cap = $request->Cap;
        $fornitore->Localita = $request->Localita;
        $fornitore->Provincia = $request->Provincia;
        $fornitore->Gruppo = $request->Gruppo;
        $fornitore->PartitaIva = $request->PartitaIva;
        $fornitore->CodiceFiscale = $request->CodiceFiscale;
        $fornitore->Telefono = $request->Telefono;
        $fornitore->Fax = $request->Fax;
        $fornitore->Cellulare = $request->Cellulare;
        $fornitore->EMail = $request->EMail;
        $fornitore->EMail2 = $request->EMail2;
        $fornitore->AliquotaIva = $request->AliquotaIva;
        $fornitore->Sconto = $request->Sconto;
        $fornitore->AbiCab = $request->AbiCab;
        $fornitore->CodicePagamento = $request->CodicePagamento;
        $fornitore->DichEsenzione = $request->DichEsenzione;
        $fornitore->Iban = $request->Iban;
        $fornitore->Tipo = $request->Tipo;
        $fornitore->RitenutaAccontoAttiva = $request->RitenutaAccontoAttiva;
        $fornitore->Tipo = 'F';

        $fornitore->save();

        return redirect()->action("FornitoriController@index");
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

        $fornitore = DB::table('anagrafe')->where('Codice', $codice)->first();

        return view('fornitori.delete', ['fornitore' => $fornitore,
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
        $fornitore = Anagrafe::find($codice);
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

        return view('fornitori.edit', ['fornitore' => $fornitore,
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
            return redirect('fornitore/' . $request->codice . '/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $fornitore = Anagrafe::find($request->Codice);
        $fornitore->RagioneSociale = $request->RagioneSociale;
        $fornitore->Indirizzo = $request->Indirizzo;
        $fornitore->Cap = $request->Cap;
        $fornitore->Localita = $request->Localita;
        $fornitore->Provincia = $request->Provincia;
        $fornitore->Gruppo = $request->Gruppo;
        $fornitore->PartitaIva = $request->PartitaIva;
        $fornitore->CodiceFiscale = $request->CodiceFiscale;
        $fornitore->Telefono = $request->Telefono;
        $fornitore->Fax = $request->Fax;
        $fornitore->Cellulare = $request->Cellulare;
        $fornitore->EMail = $request->EMail;
        $fornitore->EMail2 = $request->EMail2;
        $fornitore->AliquotaIva = $request->AliquotaIva;
        $fornitore->Sconto = $request->Sconto;
        $fornitore->AbiCab = $request->AbiCab;
        $fornitore->CodicePagamento = $request->CodicePagamento;
        $fornitore->DichEsenzione = $request->DichEsenzione;
        $fornitore->Iban = $request->Iban;
        $fornitore->Tipo = $request->Tipo;
        $fornitore->RitenutaAccontoAttiva = $request->RitenutaAccontoAttiva;
        $fornitore->Tipo = 'F';

        $fornitore->save();

        return redirect()->action("FornitoriController@index");
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

        return redirect()->action("FornitoriController@index");
    }
}
