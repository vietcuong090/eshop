<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-category">Main Menu</li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.users.index') }}">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title">Users</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.products.index') }}">
                <i class="menu-icon typcn typcn-th-large-outline"></i>
                <span class="menu-title">Products</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.orders.index')}}">
                <i class="menu-icon typcn typcn-bell"></i>
                <span class="menu-title">Orders</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.order-items.index')}}">
                <i class="menu-icon typcn typcn-bell"></i>
                <span class="menu-title">OrderItems</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.categories.index')}}">
                <i class="menu-icon typcn typcn-bell"></i>
                <span class="menu-title">Categories</span>
            </a>
        </li>
    </ul>
</nav>