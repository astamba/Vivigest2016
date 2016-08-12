<?php

?>

@extends('layouts.master')

@section('title', 'Aliquote Iva')
@section('pagetitle', 'Anagrafiche')
@section('pagesubtitle', 'Aliquote Iva')

@section('user', Auth::user()->name)

@section('scripts')
@endsection

@section('content')
    <div class="box box-primary">
        {!! Form::open(['method' => 'POST', 'route' => ['aliquoteiva.store']]) !!}
        <div class="box-body">
            <div class="box-body col-lg-2">
                <div class="form-group">
                    <label for="Codice">Codice</label>
                    {!! Form::text('Codice', '', ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="box-body col-lg-8">
                <div class="form-group">
                    <label for="Descrizione">Descrizione</label>
                    {!! Form::text('Descrizione', '', ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="box-body col-lg-2">
                <div class="form-group">
                    <label for="Aliquota">Aliquota</label>
                    {!! Form::number('Aliquota', '', ['class' => 'form-control', 'step' => 'any']) !!}
                </div>
            </div>
            <div class="col-lg-1">
                <div class="form-group">
                    <label for="Esenzione">Esenzione</label>
                    {!! Form::checkbox('Esenzione', old('Esenzione'), false) !!}
                </div>
            </div>
            <div class=" col-lg-11">
                <div class="form-group">
                    <label for="DescrizioneEstesa">Descrizione Estesa</label>
                    {!! Form::text('DescrizioneEstesa', '', ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button class="btn btn-default" type="submit" style="width: 100px">
                <span class="glyphicon glyphicon-ok"> Ok</span>
            </button>
            <a href="{{ action('AliquoteIvaController@index') }}" class="btn btn-default"><span class="glyphicon glyphicon-remove"> Annulla</span></a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection