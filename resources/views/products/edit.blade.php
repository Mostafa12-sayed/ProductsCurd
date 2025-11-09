@extends('layouts.app')

@section('content')
<h2>Edit Product</h2>

<form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Name</label>
        <input type="text" class="form-control" name="name" value="{{ $product->name }}">
        @error('name') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>SKU</label>
        <input type="text" class="form-control" name="sku" value="{{ $product->sku }}">
        @error('sku') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Price</label>
        <input type="number" class="form-control" name="price" value="{{ $product->price }}">
        @error('price') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Stock</label>
        <input type="number" class="form-control" name="stock" value="{{ $product->stock }}">
        @error('stock') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Category</label>
        <select class="form-control" name="category_id">
            <option value="" disabled selected>Select Category</option>
            @foreach($categories as $c)
            <option value="{{ $c->id }}" {{ $c->id == $product->category_id ? 'selected' : '' }}>{{ $c->name }}</option>
            @endforeach
        </select>
        @error('category_id') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea class="form-control" name="description">{{ $product->description }}</textarea>
        @error('description') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Status</label>
        <select class="form-control" name="status">
            <option value="active" {{ $product->status=='active'?'selected':'' }}>Active</option>
            <option value="inactive" {{ $product->status=='inactive'?'selected':'' }}>Inactive</option>
        </select>
        @error('status') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Image</label><br>
        @if($product->image)
            <img src="{{ asset($product->image) }}" width="80"><br><br>
        @endif
        <input type="file" class="form-control" name="image">
        @error('image') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    
    <div class="d-flex  gap-2">
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('products.index') }}" class="btn btn-danger">Cancel</a>
    </div>
</form>
@endsection
