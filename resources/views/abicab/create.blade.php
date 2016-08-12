<?php
$formmethod = 'create';
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
        {!! Form::open(['method' => 'POST', 'route' => ['abicab.store']]) !!}

        @include('abicab.body')

        <div class="box-footer">
            <button class="btn btn-default" type="submit" style="width: 100px">
                <span class="glyphicon glyphicon-ok"> Ok</span>
            </button>
            <a href="{{ action('AbiCabController@index') }}" class="btn btn-default"><span class="glyphicon glyphicon-remove"> Annulla</span></a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection