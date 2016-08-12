<?php
$formmethod = 'delete';
$codcli = $destdiv->CodiceCliFor;
?>

@extends('layouts.master')

@section('title', 'Destinazioni Diverse')
@section('pagetitle', 'Anagrafiche')
@section('pagesubtitle', 'Destinazioni Diverse')

@section('user', Auth::user()->name)

@section('scripts')
@endsection

@section('content')
    <div class="box box-primary">
        {!! Form::model($destdiv, ['method' => 'DELETE', 'route' => ['destdiv.destroy', $destdiv->ID]]) !!}

        @include('destdiv.body')

        <div class="box-footer">
            <button class="btn btn-default" type="submit" value="DELETE" style="width: 100px">
                <span class="glyphicon glyphicon-trash"> Elimina</span>
            </button>
            <a href="{{ url('clienti/' . $codcli . '/edit') }}" class="btn btn-default"><span class="glyphicon glyphicon-remove"> Annulla</span></a>
        </div>
        {!! Form::close() !!}
    </div>
@endsection