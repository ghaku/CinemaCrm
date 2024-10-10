@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Client</h1>
    <form action="{{ route('clients.update', $client->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $client->name }}" required>
        </div>
        <div class="form-group">
            <label for="surname">Surname</label>
            <input type="text" name="surname" class="form-control" value="{{ $client->surname }}" required>
        </div>
        <div class="form-group">
            <label for="middlename">Middle Name</label>
            <input type="text" name="middlename" class="form-control" value="{{ $client->middlename }}">
        </div>
        <div class="form-group">
            <label for="birthdate">Birthdate</label>
            <input type="date" name="birthdate" class="form-control" value="{{ $client->birthdate }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Client</button>
    </form>
</div>
@endsection
