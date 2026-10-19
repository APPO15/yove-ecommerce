@extends('admin.layouts.app')

@section('title', 'User Details')

@section('content')
    <div class="card">
        <h2>User Details</h2>
        <p><strong>Name:</strong> John Doe</p>
        <p><strong>Email:</strong> john@example.com</p>
        <a href="{{ url('/admin/users') }}" class="btn">Back to Users</a>
    </div>
@endsection
