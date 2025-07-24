@extends('layouts.master')

@section('title', 'home')

@section('styles')

@endsection

@section('content')
    <div class="content-wrapper">

        @php
            $user = session('loggedInUser');
        @endphp
        <h5>successfully ,you are <span class="text-danger">{{ $user['name'] }}</span></h5>
    </div>
@endsection
