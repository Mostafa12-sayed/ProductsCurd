<nav class="navbar navbar-expand-lg navbar-dark text-center ">
    <div class="container   mt-0 mb-0">
        <a class="navbar-brand" href="{{ route('products.index') }}">
            <i class="fas fa-box-open"></i> Products App
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categories.index') }}">
                        <i class="fas fa-list"></i> Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.index') }}">
                        <i class="fas fa-shopping-bag"></i> Products
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>