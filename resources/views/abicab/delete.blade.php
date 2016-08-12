<?php
$formmethod = 'delete';
?>

@extends('layouts.master')

@section('title', 'Abi-Cab')
@section('pagetitle', 'Anagrafiche')
@section('pagesubtitle', 'Abi-Cab')

@section('user', Auth::user()->name)

@section('scripts')
@endsection

@section('content')
    <div class="box box-primary">
        {!! Form::model($abicab, ['method' => 'DELETE', 'route' => ['abicab.destroy', $abicab->Codice]]) !!}

        @include('banche.body')

        <div class="box-footer">
            <button class="btn btn-default" type="submit" value="DELETE" style="width: 100px">
                <span class="glyphicon glyphicon-trash"> Elimina</span>
            </button>
            <a href="{{ action('AbiCabController@index') }}" class="btn btn-default"><span class="glyphicon glyphicon-remove"> Annulla</span></a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection