@extends('admin.layouts.app')

@section('title', 'Category Details')

@section('content')
    <div class="card">
        <h2>Category Details</h2>
        <p><strong>Name:</strong> Uncategorized</p>
        <a href="{{ url('/admin/categories') }}" class="btn">Back to Categories</a>
    </div>
@endsection
