@extends('admin.layouts.app')

@section('title', 'Users')

@section('content')
    <div class="card">
        <h2>Users</h2>
    </div>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>john@example.com</td>
                    <td>
                        <a href="{{ url('/admin/users/1') }}" class="btn">View</a>
                        <a href="{{ url('/admin/users/1/edit') }}" class="btn btn-secondary">Edit</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
