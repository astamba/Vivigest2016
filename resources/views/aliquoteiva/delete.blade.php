@extends('layouts.master')

@section('title', 'Aliquote Iva')
@section('pagetitle', 'Anagrafiche')
@section('pagesubtitle', 'Aliquote Iva')

@section('user', Auth::user()->name)

@section('scripts')
@endsection

@section('content')
    <div class="box box-primary">
        {!! Form::model($aliquota, ['method' => 'DELETE', 'route' => ['aliquoteiva.destroy', $aliquota->Codice]]) !!}
        {{--<form action="{{asset('gruppiclifor')}}">--}}
        <div class="box-body col-lg-2">
            <div class="form-group">
                <label for="Codice">Codice</label>
                {!! Form::text('Codice', old('Codice'), ['class' => 'form-control', 'readonly']) !!}
            </div>
        </div>
        <div class="box-body col-lg-8">
            <div class="form-group">
                <label for="Descrizione">Descrizione</label>
                {!! Form::text('Descrizione', old('Descrizione'), ['class' => 'form-control', 'readonly']) !!}
            </div>
        </div>
        <div class="box-body col-lg-2">
            <div class="form-group">
                <label for="Aliquota">Aliquota</label>
                {!! Form::number('Aliquota', old('Aliquota'), ['class' => 'form-control', 'readonly']) !!}
            </div>
        </div>
        <div class="col-lg-1">
            <div class="form-group">
                <label for="Esenzione">Esenzione</label>
                {!! Form::checkbox('Esenzione', old('Esenzione')) !!}
            </div>
        </div>
        <div class=" col-lg-11">
            <div class="form-group">
                <label for="DescrizioneEstesa">Descrizione Estesa</label>
                {!! Form::text('DescrizioneEstesa', old('DescrizioneEstesa'), ['class' => 'form-control', 'readonly']) !!}
            </div>
        </div>
        <div class="box-footer">
            <button class="btn btn-default" type="submit" value="DELETE" style="width: 100px">
                <span class="glyphicon glyphicon-trash"> Elimina</span>
            </button>
            <a href="{{ action('AliquoteIvaController@index') }}" class="btn btn-default"><span class="glyphicon glyphicon-remove"> Annulla</span></a>
        </div>
        {!! Form::close() !!}
        {{--</form>--}}
    </div>
@endsection