<?php
$formmethod = 'update';
?>

@extends('layouts.master')

@section('title', 'Aspetto dei Beni')
@section('pagetitle', 'Anagrafiche')
@section('pagesubtitle', 'Aspetto dei Beni')

@section('user', Auth::user()->name)

@section('scripts')
@endsection

@section('content')
    <div class="box box-primary">
        {!! Form::model($ab, ['method' => 'PUT', 'route' => ['aspettobeni.update', 'Codice' => $ab->Codice ]]) !!}

        @include('aspettobeni.body')

        <div class="box-footer">
            <button class="btn btn-default" type="submit" style="width: 100px">
                <span class="glyphicon glyphicon-ok"> Ok</span>
            </button>
            <a href="{{ action('AspettoBeniController@index') }}" class="btn btn-default"><span class="glyphicon glyphicon-remove"> Annulla</span></a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection