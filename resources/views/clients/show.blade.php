@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Client Details</h1>
    <p><strong>Name:</strong> {{ $client->name }}</p>
    <p><strong>Surname:</strong> {{ $client->surname }}</p>
    <p><strong>Middle Name:</strong> {{ $client->middlename }}</p>
    <p><strong>Birthdate:</strong> {{ $client->birthdate }}</p>
    <a href="{{ route('clients.index') }}" class="btn btn-secondary">Back to Clients</a>
</div>
@endsection
