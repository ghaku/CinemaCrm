@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Hall Details</h1>
    <p><strong>Name:</strong> {{ $hall->name }}</p>
    <p><strong>Capacity:</strong> {{ $hall->capacity }}</p>
    <a href="{{ route('halls.index') }}" class="btn btn-secondary">Back to Halls</a>
</div>
@endsection
