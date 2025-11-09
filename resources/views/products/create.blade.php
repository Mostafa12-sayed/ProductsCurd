@extends('layouts.app')

@section('content')
<h2>Add Product</h2>

<form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label>Name</label>
        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
        @error('name') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>SKU</label>
        <input type="text" class="form-control" name="sku" value="{{ old('sku') }}">
        @error('sku') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Price</label>
        <input type="number" class="form-control" name="price" value="{{ old('price') }}">
        @error('price') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Stock</label>
        <input type="number" class="form-control" name="stock" value="{{ old('stock') }}">
        @error('stock') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Category</label>
        <select class="form-control" name="category_id">
            <option value="" disabled selected>Select Category</option>
            @foreach($categories as $c)
            <option value="{{ $c->id }}" {{ old('category_id') == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
            @endforeach
        </select>
        @error('category_id') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea class="form-control" name="description" >{{ old('description') }}</textarea>
        @error('description') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select class="form-control" name="status">
            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
        </select>

        @error('status') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Image</label>
        <input type="file" class="form-control" name="image">
        @error('image') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="d-flex  gap-2">
        <button class="btn btn-success">Save</button>
        <a href="{{ route('products.index') }}" class="btn btn-danger">Cancel</a>
    </div>
</form>
@endsection
