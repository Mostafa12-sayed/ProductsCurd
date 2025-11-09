@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2 class="mb-0">Categories</h2>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">
        <i class="fa fa-plus"></i> Add Category</a>
</div>

 <table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Total Products</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if (count($categories) == 0)
        <tr>
            <td colspan="4" class="text-center">No categories found</td>
        </tr>
        @endif
        @foreach ($categories as $cat)
        <tr id="cat-{{ $cat->id }}">
            <td>{{ $cat->id }}</td>
            <td>{{ $cat->name }}</td>
            <td>{{ $cat->products_count }}</td>
            <td>
                <a href="{{ route('categories.edit', $cat->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <button class="btn btn-sm btn-danger" onclick="deleteConfirm('/categories/{{ $cat->id }}', 'cat-{{ $cat->id }}')">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $categories->links() }}
   

@endsection
