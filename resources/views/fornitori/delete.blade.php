<?php
$formmethod = 'delete';
?>

@extends('layouts.master')

@section('title', 'Fornitori')
@section('pagetitle', 'Anagrafiche')
@section('pagesubtitle', 'Fornitori')

@section('user', Auth::user()->name)

@section('scripts')
@endsection

@section('content')
    <div class="box box-primary">
        {!! Form::model($fornitore, ['method' => 'DELETE', 'route' => ['fornitore.destroy', $fornitore->Codice]]) !!}

        @include('fornitori.body')

        <div class="box-footer">
            <button class="btn btn-default" type="submit" value="DELETE" style="width: 100px">
                <span class="glyphicon glyphicon-trash"> Elimina</span>
            </button>
            <a href="{{ action('FornitoriController@index') }}" class="btn btn-default"><span class="glyphicon glyphicon-remove"> Annulla</span></a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection