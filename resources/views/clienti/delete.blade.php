<?php
$formmethod = 'delete';
?>

@extends('layouts.master')

@section('title', 'Clienti')
@section('pagetitle', 'Anagrafiche')
@section('pagesubtitle', 'Clienti')

@section('user', Auth::user()->name)

@section('scripts')
@endsection

@section('content')
    <div class="box box-primary">
        {!! Form::model($cliente, ['method' => 'DELETE', 'route' => ['clienti.destroy', $cliente->Codice]]) !!}

        @include('clienti.body')

        <div class="box-footer">
            <button class="btn btn-default" type="submit" value="DELETE" style="width: 100px">
                <span class="glyphicon glyphicon-trash"> Elimina</span>
            </button>
            <a href="{{ action('ClientiController@index') }}" class="btn btn-default"><span class="glyphicon glyphicon-remove"> Annulla</span></a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection