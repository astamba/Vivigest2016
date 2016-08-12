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

@section('title', 'Porti')
@section('pagetitle', 'Anagrafiche')
@section('pagesubtitle', 'Porti')

@section('user', Auth::user()->name)

@section('scripts')
@endsection

@section('content')
    <div class="box box-primary">
        {!! Form::model($porto, ['method' => 'PUT', 'route' => ['porti.update', 'Codice' => $porto->Codice ]]) !!}

        @include('tipologiespedizione.body')

        <div class="box-footer">
            <button class="btn btn-default" type="submit" style="width: 100px">
                <span class="glyphicon glyphicon-ok"> Ok</span>
            </button>
            <a href="{{ action('PortiController@index') }}" class="btn btn-default"><span class="glyphicon glyphicon-remove"> Annulla</span></a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection