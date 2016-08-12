<?php
$formmethod = 'update';
?>

@extends('layouts.master')

@section('title', 'Clienti')
@section('pagetitle', 'Anagrafiche')
@section('pagesubtitle', 'Clienti')

@section('user', Auth::user()->name)

@section('content')
    {!! Form::model($cliente, ['method' => 'PUT', 'route' => ['clienti.update', 'codice' => $cliente->Codice ]]) !!}

    @include('clienti.body')

    <div class="box-footer">
        <div class="form-group">
            <button class="btn btn-default" type="submit" style="width: 100px">
                <span class="glyphicon glyphicon-ok"> Ok</span>
            </button>
            <a href="{{ action('ClientiController@index') }}" class="btn btn-default"><span class="glyphicon glyphicon-remove"> Annulla</span></a>
        </div>
    </div>


    {!! Form::close() !!}
@endsection