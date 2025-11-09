@extends('layouts.app')

@section('content')
<h2>Add Category</h2>

<form method="POST" action="{{ route('categories.store') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Category Name</label>
        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
        @error('name') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

        <div class="d-flex  gap-2">
            <button class="btn btn-success">Save</button>
            <a href="{{ route('categories.index') }}" class="btn btn-danger">Cancel</a>
        </div>
    </div>
</form>
@endsection
