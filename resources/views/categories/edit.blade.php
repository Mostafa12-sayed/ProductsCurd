@extends('layouts.app')

@section('content')
<h2>Edit Category</h2>

<form method="POST" action="{{ route('categories.update', $category->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Category Name</label>
        <input type="text" class="form-control" name="name" value="{{ $category->name }}">
        @error('name') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="d-flex  gap-2">
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('categories.index') }}" class="btn btn-danger">Cancel</a>
    </div>
</form>
@endsection