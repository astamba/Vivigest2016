<?php
$formmethod = 'delete';
$codcli = $contatto->CodiceCliFor;
?>

@extends('layouts.master')

@section('title', 'Contatti')
@section('pagetitle', 'Anagrafiche')
@section('pagesubtitle', 'Contatti')

@section('user', Auth::user()->name)

@section('scripts')
@endsection

@section('content')
    <div class="box box-primary">
        {!! Form::model($contatto, ['method' => 'DELETE', 'route' => ['contatti.destroy', $contatto->ID]]) !!}

        @include('contatti.body')

        <div class="box-footer">
            <button class="btn btn-default" type="submit" value="DELETE" style="width: 100px">
                <span class="glyphicon glyphicon-trash"> Elimina</span>
            </button>
            <a href="{{ url('clienti/' . $codcli . '/edit') }}" class="btn btn-default"><span class="glyphicon glyphicon-remove"> Annulla</span></a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection