<?php
$formmethod = 'create';
?>

@extends('layouts.master')

@section('title', 'Fornitori')
@section('pagetitle', 'Anagrafiche')
@section('pagesubtitle', 'Fornitori')

@section('user', Auth::user()->name)

@section('scripts')
@endsection

@section('content')
    {!! Form::open(['method' => 'POST', 'route' => ['fornitori.store']]) !!}

    @include('fornitori.body')

    <div class="box-footer">
        <div class="form-group">
            <button class="btn btn-default" type="submit" style="width: 100px">
                <span class="glyphicon glyphicon-ok"> Ok</span>
            </button>
            <a href="{{ action('FornitoriController@index') }}" class="btn btn-default"><span class="glyphicon glyphicon-remove"> Annulla</span></a>
        </div>
    </div>

    {!! Form::close() !!}
@endsection