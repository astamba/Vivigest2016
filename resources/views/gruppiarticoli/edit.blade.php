<?php
if(isset($validator)){
    $messages = $validator->errors();

    foreach ($messages->all() as $message) {
        echo $message;
    }
}

$formmethod = 'update';
?>

@extends('layouts.master')

@section('title', 'Gruppi Articoli')
@section('pagetitle', 'Magazzino')
@section('pagesubtitle', 'Gruppi Articoli')

@section('user', Auth::user()->name)

@section('scripts')
@endsection

@section('content')
    <div class="box box-primary">
        {!! Form::model($gruppo, ['method' => 'PUT', 'route' => ['gruppiarticoli.update', 'Codice' => $gruppo->Codice ]]) !!}

        @include('gruppiarticoli.body')

        <div class="box-footer">
            <button class="btn btn-default" type="submit" style="width: 100px">
                <span class="glyphicon glyphicon-ok"> Ok</span>
            </button>
            <a href="{{ action('GruppiArticoliController@index') }}" class="btn btn-default"><span class="glyphicon glyphicon-remove"> Annulla</span></a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection