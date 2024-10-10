@extends('layouts.app')

@section('content')
    <h1>Welcome to the Cinema CRM</h1>
    <p><a href="{{ url('/clients') }}">Manage Clients</a></p>
    <p><a href="{{ url('/movies') }}">Manage Movies</a></p>
@endsection
