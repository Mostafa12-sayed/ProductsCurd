@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <div class="d-flex justify-content-between align-items-center gap-3 mb-3">
            <h2>List of Products</h2>
            <a href="{{ route('products.export') }}" class="btn btn-primary ">
                <i class="fa-solid fa-file-csv"></i> </a>
        </div>
        <div class="d-flex justify-content-between align-items-center gap-3 mb-3">
                <a href="{{ route('products.create') }}" class="btn btn-primary mb-3"><i class="fa fa-plus"></i>Add Product</a>
        </div>
    </div>
 
    <input type="text" id="searchBox" class="form-control mb-3" placeholder="Search...">
    <div id="productsTable">
        @include('products.table')
    </div>
    {{ $products->links() }}
@endsection
@section('scripts')

<script>
    
    function debounce(func, delay) {
        let timer;
        return function(...args) {
            clearTimeout(timer);
            timer = setTimeout(() => func.apply(this, args), delay);
        };
    }

    const fetchProducts = () => {
        let q = document.getElementById('searchBox').value;

        fetch("{{ route('products.index') }}?q=" + encodeURIComponent(q), {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(res => res.text())
        .then(data => {
            document.getElementById('productsTable').innerHTML = data;
            attachPaginationLinks(); 
        })
        .catch(err => console.error(err));
    };

    document.getElementById('searchBox').addEventListener('keyup', debounce(fetchProducts, 300));

    // AJAX Pagination
    function attachPaginationLinks() {
        document.querySelectorAll('#productsTable .pagination a').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                let url = this.href;

                fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(res => res.text())
                .then(data => {
                    document.getElementById('productsTable').innerHTML = data;
                    attachPaginationLinks();
                });
            });
        });
    }
    attachPaginationLinks();
</script>
@endsection