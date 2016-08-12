<?php
if(isset($validator)){
    $messages = $validator->errors();

    foreach ($messages->all() as $message) {
        echo $message;
    }
}
?>

@extends('layouts.master')

@section('title', 'Pagamenti')
@section('pagetitle', 'Anagrafiche')
@section('pagesubtitle', 'Pagamenti')

@section('user', Auth::user()->name)

@section('scripts')
@endsection

@section('content')
    <div class="box box-primary">
        {!! Form::model($pagamento, ['method' => 'PUT', 'route' => ['pagamenti.update', 'codice' => $pagamento->Codice ]]) !!}
        <div class="box-body">
            <div class="col-lg-2">
                <div class="form-group">
                    <label for="Codice">Codice</label>
                    {!! Form::text('Codice', old('Codice'), ['class' => 'form-control', 'readonly']) !!}
                </div>
            </div>
            <div class="col-lg-10">
                <div class="form-group">
                    <label for="Descrizione">Descrizione</label>
                    {!! Form::text('Descrizione', old('Descrizione'), ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label for="Tipologia">Tipologia Scadenza</label>
                    {!! Form::select('Tipologia', array('B'=>'Bonifico',
                                                       'R'=>'Ricevuta Bancaria',
                                                       'D'=>'Rimessa Diretta',
                                                       'C'=>'Contrassegno',
                                                       'A'=>'Altro'), null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label for="DataFrom">Prima Scadenza</label>
                    {!! Form::select('DataFrom', array('D'=>'Data Fattura', 'F'=>'Fine Mese'), null, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label for="ggPartenza">Prima Rata</label>
                    {!! Form::text('ggPartenza', old('ggPartenza'), ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label for="NumScadenze">N° Scadenze</label>
                    {!! Form::number('NumScadenze', old('NumScadenze'), ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label for="ggIntervallo">Periodo</label>
                    {!! Form::number('ggIntervallo', old('ggIntervallo'), ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label for="PercAcconto">Perc. Acconto</label>
                    {!! Form::number('PercAcconto', old('PercAcconto'), ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label for="ggFissi1">gg Fissi 1</label>
                    {!! Form::number('ggFissi1', old('ggFissi1'), ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label for="ggFissi2">gg Fissi 2</label>
                    {!! Form::number('ggFissi2', old('ggFissi2'), ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label for="ggFissi3">gg Fissi 3</label>
                    {!! Form::number('ggFissi3', old('ggFissi3'), ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>



        <div class="box-footer col-lg-12">
            <button class="btn btn-default" type="submit" style="width: 100px">
                <span class="glyphicon glyphicon-ok"> Ok</span>
            </button>
            <a href="{{ action('PagamentiController@index') }}" class="btn btn-default"><span class="glyphicon glyphicon-remove"> Annulla</span></a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection