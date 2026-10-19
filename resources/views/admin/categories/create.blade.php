@extends('admin.layouts.app')

@section('content')

<div class="card shadow">

    <div class="card-header">

        <h3 class="mb-0">
            Add Category
        </h3>

    </div>

    <div class="card-body">

        <form action="{{ route('admin.categories.store') }}"
              method="POST">

            @csrf

            {{-- Name --}}
            <div class="mb-3">

                <label class="form-label">
                    Category Name
                </label>

                <input
                    type="text"
                    name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}"
                    placeholder="Enter category name">

                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            {{-- Description --}}
            <div class="mb-3">

                <label class="form-label">
                    Description
                </label>

                <textarea
                    name="description"
                    rows="4"
                    class="form-control @error('description') is-invalid @enderror"
                    placeholder="Enter category description">{{ old('description') }}</textarea>

                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div>

                <button type="submit"
                        class="btn btn-success">

                    Save Category

                </button>

                <a href="{{ route('admin.categories.index') }}"
                   class="btn btn-secondary">

                    Cancel

                </a>

            </div>

        </form>

    </div>

</div>

@endsection
