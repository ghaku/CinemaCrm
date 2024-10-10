@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Client</h1>
    <form action="{{ route('clients.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="surname">Surname</label>
            <input type="text" name="surname" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="middlename">Middle Name</label>
            <input type="text" name="middlename" class="form-control">
        </div>
        <div class="form-group">
            <label for="birthdate">Birthdate</label>
            <input type="date" name="birthdate" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Client</button>
    </form>
</div>
@endsection
