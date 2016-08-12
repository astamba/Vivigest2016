<?php
$formmethod = 'delete';
?>

@extends('layouts.master')

@section('title', 'Unità di Misura')
@section('pagetitle', 'Anagrafiche')
@section('pagesubtitle', 'Unità di Misura')

@section('user', Auth::user()->name)

@section('scripts')
@endsection

@section('content')
    <div class="box box-primary">
        {!! Form::model($um, ['method' => 'DELETE', 'route' => ['unitamisura.destroy', $um->Codice]]) !!}

        @include('unitamisura.body')

        <div class="box-footer">
            <button class="btn btn-default" type="submit" value="DELETE" style="width: 100px">
                <span class="glyphicon glyphicon-trash"> Elimina</span>
            </button>
            <a href="{{ action('UnitaMisuraController@index') }}" class="btn btn-default"><span class="glyphicon glyphicon-remove"> Annulla</span></a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection