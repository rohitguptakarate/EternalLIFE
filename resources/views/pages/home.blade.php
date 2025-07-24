@extends('layouts.master')

@section('title', 'home')

@section('styles')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

@endsection


@section('content')

    <div class="content-wrapper">
        <h1>I am home page </h1>
    </div>

@endsection
