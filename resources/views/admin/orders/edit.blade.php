@extends('admin.layouts.app')

@section('title', 'Edit Order')

@section('content')
    <div class="card">
        <h2>Edit Order</h2>
        <form>
            <label for="status">Status</label>
            <select id="status" name="status">
                <option value="pending">Pending</option>
                <option value="processing">Processing</option>
                <option value="completed">Completed</option>
            </select>

            <button type="submit" class="btn">Update Order</button>
            <a href="{{ url('/admin/orders') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
