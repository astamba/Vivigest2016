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
        {!! Form::open(['method' => 'POST', 'route' => ['gruppiclifor.store']]) !!}
        <div class="box-body col-lg-2">
            <div class="form-group">
                <label for="Codice">Codice</label>
                {!! Form::text('Codice', '', ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="box-body col-lg-10">
            <div class="form-group">
                <label for="descrizione">Descrizione</label>
                {!! Form::text('Descrizione', '', ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="box-footer">
            <button class="btn btn-default" type="submit" style="width: 100px">
                <span class="glyphicon glyphicon-ok"> Ok</span>
            </button>
            <a href="{{ action('GruppiCliForController@index') }}" class="btn btn-default"><span class="glyphicon glyphicon-remove"> Annulla</span></a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection