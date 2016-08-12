<?php

?>

@extends('layouts.master')

@section('title', 'Vettori')
@section('pagetitle', 'Anagrafiche')
@section('pagesubtitle', 'Vettori')

@section('user', Auth::user()->name)

@section('scripts')
@endsection

@section('content')
    <div class="box box-primary">
        {!! Form::open(['method' => 'POST', 'route' => ['vettori.store']]) !!}
        <div class="box-body">
            <div class=" col-lg-2">
                <div class="form-group">
                    <label for="Codice">Codice</label>
                    {!! Form::text('Codice', '', ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-lg-10">
                <div class="form-group">
                    <label for="descrizione">Descrizione</label>
                    {!! Form::text('Descrizione', '', ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="Telefono">Telefono</label>
                    {!! Form::text('Telefono', old('Telefono'), ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="Fax">Fax</label>
                    {!! Form::text('Fax', old('Fax'), ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="EMail">E-Mail</label>
                    {!! Form::text('EMail', old('EMail'), ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button class="btn btn-default" type="submit" style="width: 100px">
                <span class="glyphicon glyphicon-ok"> Ok</span>
            </button>
            <a href="{{ action('VettoriController@index') }}" class="btn btn-default"><span class="glyphicon glyphicon-remove"> Annulla</span></a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection