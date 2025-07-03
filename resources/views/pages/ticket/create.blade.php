@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Ticket</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ticket.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" name="firstName" class="form-control" id="firstName" value="{{ old('firstName') }}" required>
        </div>
        <div class="mb-3">
            <label for="Lastname" class="form-label">Last Name</label>
            <input type="text" name="Lastname" class="form-control" id="Lastname" value="{{ old('Lastname') }}" required>
        </div>
        <div class="mb-3">
            <label for="refNumber" class="form-label">Reference Number</label>
            <input type="text" name="refNumber" class="form-control" id="refNumber" value="{{ old('refNumber') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Ticket</button>
    </form>
</div>
@endsection