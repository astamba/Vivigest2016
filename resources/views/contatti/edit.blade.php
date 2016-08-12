<?php
$formmethod = 'update';
$codcli = $contatto->CodiceCliFor;
?>

@extends('layouts.master')

@section('title', 'Contatti')
@section('pagetitle', 'Anagrafiche')
@section('pagesubtitle', 'Contatti')

@section('user', Auth::user()->name)

@section('content')
    {!! Form::model($contatto, ['method' => 'PUT', 'route' => ['contatti.update', 'ID' => $contatto->ID ]]) !!}

    @include('contatti.body')

    <div class="box-footer">
        <div class="form-group">
            <button class="btn btn-default" type="submit" style="width: 100px">
                <span class="glyphicon glyphicon-ok"> Ok</span>
            </button>
            <a href="{{ url('clienti/' . $codcli . '/edit') }}" class="btn btn-default"><span class="glyphicon glyphicon-remove"> Annulla</span></a>
        </div>
    </div>


    {!! Form::close() !!}
@endsection