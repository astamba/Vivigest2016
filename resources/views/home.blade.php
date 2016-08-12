@extends('layouts.master')

@section('title', 'Home')
@section('pagetitle', 'Home')
@section('pagesubtitle', '')
@section('user', Auth::user()->name)

@section('content')

@endsection