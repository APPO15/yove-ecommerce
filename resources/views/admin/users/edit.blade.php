@extends('admin.layouts.app')

@section('title', 'Edit User')

@section('content')
    <div class="card">
        <h2>Edit User</h2>
        <form>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="John Doe">

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="john@example.com">

            <button type="submit" class="btn">Update User</button>
            <a href="{{ url('/admin/users') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
