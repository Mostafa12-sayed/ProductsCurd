@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <div class=" ">
            <div class="row g-0">
                <!-- Product Image -->
                <div class="col-md-5 d-flex align-items-center justify-content-center p-5">
                    <img src="{{ asset( $product->image) }}" 
                         class="img-fluid rounded-start h-100 w-100 object-fit-cover" 
                         alt="{{ $product->name }}">
                </div>

                <!-- Product Details -->
                <div class="col-md-7">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            @if($product->status == 'active')
                                <span class="badge bg-success">
                                    <i class="bi bi-check-circle"></i> Active
                                </span>
                            @else
                                <span class="badge bg-secondary">
                                    <i class="bi bi-x-circle"></i> Inactive
                                </span>
                            @endif
                        </div>

                        <h2 class="card-title fw-bold mb-3">
                            {{ $product->name }}
                        </h2>

                        <h3 class="text-primary mb-4">
                            ${{ $product->price }}
                        </h3>

                        <div class="mb-4">
                            <div class="row g-3">
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-upc-scan fs-5 text-muted me-2"></i>
                                        <div>
                                            <small class="text-muted d-block">SKU</small>
                                            <strong>{{ $product->sku }}</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-box-seam fs-5 text-muted me-2"></i>
                                        <div>
                                            <small class="text-muted d-block">Stock</small>
                                            <strong class="{{ $product->stock > 0 ? 'text-success' : 'text-danger' }}">
                                                {{ $product->stock }} units
                                            </strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-tag fs-5 text-muted me-2"></i>
                                        <div>
                                            <small class="text-muted d-block">Category</small>
                                            <strong>{{ $product->category->name ?? 'N/A' }}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <h5 class="fw-semibold mb-2">Description</h5>
                            <p class="text-muted">
                                {{ $product->description ?? 'No description available.' }}
                            </p>
                        </div>   
                    </div>
                </div>
            </div>
    </div>
@endsection