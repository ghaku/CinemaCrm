@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Seat</h1>

    <form action="{{ route('seats.update', $seat->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="seatNumber" class="form-label">Seat Number</label>
            <input type="number" name="seatNumber" class="form-control" value="{{ $seat->seatNumber }}" required>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select name="type" class="form-select" required>
                <option value="regular" {{ $seat->type == 'regular' ? 'selected' : '' }}>Regular</option>
                <option value="VIP" {{ $seat->type == 'VIP' ? 'selected' : '' }}>VIP</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="hall_id" class="form-label">Hall</label>
            <select name="hall_id" class="form-select" required>
                @foreach ($halls as $hall)
                    <option value="{{ $hall->id }}" {{ $seat->hall_id == $hall->id ? 'selected' : '' }}>{{ $hall->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Seat</button>
        <a href="{{ route('seats.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
