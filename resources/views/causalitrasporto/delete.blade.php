<?php
$formmethod = 'delete';
?>

@extends('layouts.master')

@section('title', 'Causali Trasporto')
@section('pagetitle', 'Anagrafiche')
@section('pagesubtitle', 'Causali Trasporto')

@section('user', Auth::user()->name)

@section('scripts')
@endsection

@section('content')
    <div class="box box-primary">
        {!! Form::model($causale, ['method' => 'DELETE', 'route' => ['causalitrasporto.destroy', $causale->Codice]]) !!}

        @include('causalitrasporto.body')

        <div class="box-footer">
            <button class="btn btn-default" type="submit" value="DELETE" style="width: 100px">
                <span class="glyphicon glyphicon-trash"> Elimina</span>
            </button>
            <a href="{{ action('CausaliTrasportoController@index') }}" class="btn btn-default"><span class="glyphicon glyphicon-remove"> Annulla</span></a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection