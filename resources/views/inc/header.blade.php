<!-- Navbar Start -->
<div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
        <div class="col-lg-6 px-5 text-start">
            <small><i class="fa fa-map-marker-alt me-2"></i>123 Street, Hue, VIETNAM</small>
            <small class="ms-4"><i class="fa fa-envelope me-2"></i>tranvietcuong090@gmail.com</small>
        </div>
        <div class="col-lg-6 px-5 text-end">
            <small>Follow VN:</small>
            <a class="text-body ms-3" href=""><i class="fab fa-facebook-f"></i></a>
            <a class="text-body ms-3" href=""><i class="fab fa-twitter"></i></a>
            <a class="text-body ms-3" href=""><i class="fab fa-linkedin-in"></i></a>
            <a class="text-body ms-3" href=""><i class="fab fa-instagram"></i></a>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="index.html" class="navbar-brand ms-4 ms-lg-0">
            <h1 class="fw-bold text-primary m-0">F<span class="text-secondary">oo</span>dy</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ route('home.index') }}" class="nav-item nav-link">Home</a>
                <a href="{{ route('about-index.index') }}" class="nav-item nav-link">About Us</a>
                <a href="{{ route('product-index.index') }}" class="nav-item nav-link active">Products</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <a href="blog.html" class="dropdown-item">Blog Grid</a>
                        <a href="feature.html" class="dropdown-item">Our Features</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Page</a>
                    </div>
                </div>
                <a href="{{ route('contact-index.index')}}" class="nav-item nav-link">Contact</a>
            </div>
            <div class="d-none d-lg-flex ms-2">
                <form class="d-flex" id="search" action="{{ route('search-home') }}" method="GET">
                    <input name="search" class="form-control me-2 rounded-pill mt-2" type="search" placeholder="Search ....." aria-label="Search">
                    <button class="btn btn-outline-success mt-2" type="submit">Search</button>
                </form>
                <a class="btn-sm-square bg-white rounded-circle ms-2 mt-2" href="">
                    <small class="fa fa-user text-body"></small>
                </a>
               <div>
                <a href="">
                <a class="btn-sm-square bg-white rounded-circle ms-2 mt-2" href="{{ route('page-card') }}">
                    <small class="fa fa-shopping-bag text-body"></small>  
                    @php
                    $cartItems = session('cart');
                    $cartCount = is_array($cartItems) ? array_sum(array_column($cartItems, 'quantity')) : 0;
                    @endphp
                    {{ $cartCount }}
                </a>
            </a>
            </div>
            </div>
        </div>
    </nav>
</div>
<!-- Navbar End -->


<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="display-3 mb-3 animated slideInDown">FOODY</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="text-body" href="#">Home</a></li>
                <li class="breadcrumb-item"><a class="text-body" href="#">Pages</a></li>
                <li class="breadcrumb-item text-dark active" aria-current="page">Products</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->