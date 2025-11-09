
<table class="table table-bordered table-striped" id="productsTable">
    <thead class="table-dark text-center align-middle border-rounded">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>SKU</th>
            <th>Stock</th>
            <th>Price</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody class="text-center">
        @if (count($products) == 0)
            <tr class="text-center py-5">
                <td colspan="9" class="text-center">No products found</td>
            </tr>
        @endif
        @foreach ($products as $p)
        <tr id="prod-{{ $p->id }}">
            <td>{{ $p->id }}</td>
            <td>{{ $p->name }}</td>
            <td>{{ $p->sku }}</td>
            <td>{{ $p->stock }}</td>
            <td>{{ $p->price }}</td>
            <td>{{ optional($p->category)->name }}</td>
            <td>{{ $p->status }}</td>
            <td>
                @if($p->image)
                <img src="{{ asset($p->image) }}" width="50">
                @endif
            </td>
            <td>
                <a href="{{ route('products.edit', $p->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <a href="{{ route('products.show', $p->id) }}" class="btn btn-sm btn-success">Show</a>

                <button class="btn btn-sm btn-danger"
                    onclick="deleteConfirm('/products/{{ $p->id }}', 'prod-{{ $p->id }}')">
                    Delete
                </button>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>