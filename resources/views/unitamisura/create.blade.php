<?php
$formmethod = 'create';
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
        {!! Form::open(['method' => 'POST', 'route' => ['unitamisura.store']]) !!}

        @include('unitamisura.body')

        <div class="box-footer">
            <button class="btn btn-default" type="submit" style="width: 100px">
                <span class="glyphicon glyphicon-ok"> Ok</span>
            </button>
            <a href="{{ action('UnitaMisuraController@index') }}" class="btn btn-default"><span class="glyphicon glyphicon-remove"> Annulla</span></a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection