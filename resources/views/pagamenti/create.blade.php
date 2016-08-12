<?php

?>

@extends('layouts.master')

@section('title', 'Gruppi Cli/For')
@section('pagetitle', 'Anagrafiche')
@section('pagesubtitle', 'Gruppi Cli/For')

@section('user', Auth::user()->name)

@section('scripts')
@endsection

@section('content')
    <div class="box box-primary">
        {!! Form::open(['method' => 'POST', 'route' => ['pagamenti.store']]) !!}
        <div class="box-body col-lg-2">
            <div class="form-group">
                <label for="codice">Codice</label>
                {!! Form::text('codice', '', ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="box-body col-lg-10">
            <div class="form-group">
                <label for="descrizione">Descrizione</label>
                {!! Form::text('descrizione', '', ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="box-body col-lg-2">
            <div class="form-group">
                <label for="tiposcad">Tipologia Scadenza</label>
                {!! Form::select('tiposcad', array('B'=>'Bonifico',
                                                   'R'=>'Ricevuta Bancaria',
                                                   'D'=>'Rimessa Diretta',
                                                   'C'=>'Contrassegno',
                                                   'A'=>'Altro'), null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="box-body col-lg-2">
            <div class="form-group">
                <label for="datafrom">Prima Scadenza</label>
                {!! Form::select('datafrom', array('D'=>'Data Fattura', 'F'=>'Fine Mese'), null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="box-body col-lg-2">
            <div class="form-group">
                <label for="giorni1">Prima Rata</label>
                {!! Form::text('giorni1', old('giorni1'), ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="box-body col-lg-2">
            <div class="form-group">
                <label for="numscad">N° Scadenze</label>
                {!! Form::number('numscad', old('numscad'), ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="box-body col-lg-2">
            <div class="form-group">
                <label for="periodo">Periodo</label>
                {!! Form::number('periodo', old('periodo'), ['class' => 'form-control']) !!}
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