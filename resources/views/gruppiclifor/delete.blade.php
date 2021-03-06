@extends('layouts.master')

@section('title', 'Gruppi Cli/For')
@section('pagetitle', 'Anagrafiche')
@section('pagesubtitle', 'Gruppi Cli/For')

@section('user', Auth::user()->name)

@section('scripts')
@endsection

@section('content')
    <div class="box box-primary">
        {!! Form::model($gruppo, ['method' => 'DELETE', 'route' => ['gruppiclifor.destroy', $gruppo->Codice]]) !!}
        {{--<form action="{{asset('gruppiclifor')}}">--}}
        <div class="box-body col-lg-2">
            <div class="form-group">
                <label for="Codice">Codice</label>
                {!! Form::text('Codice', old('Codice'), ['class' => 'form-control', 'readonly']) !!}
            </div>
        </div>
        <div class="box-body col-lg-10">
            <div class="form-group">
                <label for="Descrizione">Descrizione</label>
                {!! Form::text('Descrizione', old('Descrizione'), ['class' => 'form-control', 'readonly']) !!}
            </div>
        </div>
        <div class="box-footer">
            <button class="btn btn-default" type="submit" value="DELETE" style="width: 100px">
                <span class="glyphicon glyphicon-trash"> Elimina</span>
            </button>
            <a href="{{ action('GruppiCliForController@index') }}" class="btn btn-default"><span class="glyphicon glyphicon-remove"> Annulla</span></a>
        </div>
        {!! Form::close() !!}
        {{--</form>--}}
    </div>
@endsection