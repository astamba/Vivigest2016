<?php
$formmethod = 'delete';
?>

@extends('layouts.master')

@section('title', 'Porti')
@section('pagetitle', 'Anagrafiche')
@section('pagesubtitle', 'Porti')

@section('user', Auth::user()->name)

@section('scripts')
@endsection

@section('content')
    <div class="box box-primary">
        {!! Form::model($porto, ['method' => 'DELETE', 'route' => ['porti.destroy', $porto->Codice]]) !!}

        @include('porti.body')

        <div class="box-footer">
            <button class="btn btn-default" type="submit" value="DELETE" style="width: 100px">
                <span class="glyphicon glyphicon-trash"> Elimina</span>
            </button>
            <a href="{{ action('PortiController@index') }}" class="btn btn-default"><span class="glyphicon glyphicon-remove"> Annulla</span></a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection