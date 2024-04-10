<nav class="page-sidebar" id="sidebar" style="background-color: #333; padding: 10px; margin-top: -10px; z-index: 100">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex" style="margin-bottom: 20px;">
            <div style="margin-right: 10px;">
                @if (file_exists(public_path() . '/uploads/user/' . auth()->user()->image))
                    <img src="{{ asset('uploads/user' . auth()->user()->image) }}" alt="" width="45px"
                        style="border-radius: 50%;">
                @endif
            </div>
            <div class="admin-info">
                <div class="font-strong" style="color: #fff; font-weight: bold;">{{ auth()->user()->name }}</div>
                <small style="color: #bbb;">{{ ucfirst(auth()->user()->role) }}</small>
            </div>
        </div>
        <ul class="side-menu metismenu" style="list-style: none; padding: 0;">
            <li style="margin-bottom: 10px;">
                <a class="active" href="{{ route(auth()->user()->role) }}" style="text-decoration: none; color: #fff;">
                    <i class="sidebar-item-icon fas fa-tachometer-alt" style="margin-right: 5px;"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li style="margin-bottom: 10px;">
                <a href="#" onclick="toggleDropdown('bannerMenu')" style="text-decoration: none; color: #fff;">
                    <i class="sidebar-item-icon fas fa-images" style="margin-right: 5px;"></i>
                    <span class="nav-label">Manage Banner</span>
                    <i class="fas fa-chevron-down" style="float: right; margin-top: -15px;"></i>
                </a>
                <ul class="collapse list-unstyled" id="bannerMenu" style="display: none;">
                    <li><a href="{{ route('banner.index') }}" style="color: #fff; text-decoration: none; margin-left: 40px">All Banners</a></li>
                    <li><a href="{{ route('banner.create') }}" style="color: #fff; text-decoration: none; margin-left: 40px">Add New Banner</a></li>
                </ul>
            </li>
            <li style="margin-bottom: 10px;">
                <a href="#" onclick="toggleDropdown('categoryMenu')" style="text-decoration: none; color: #fff;">
                    <i class="sidebar-item-icon fas fa-sitemap" style="margin-right: 5px;"></i>
                    <span class="nav-label">Manage Category</span>
                    <i class="fas fa-chevron-down" style="float: right;  margin-top: -15px"></i>
                </a>
                <ul class="collapse list-unstyled" id="categoryMenu" style="display: none;">
                    <li><a href="{{ route('category.index') }}" style="color: #fff; text-decoration: none; margin-left: 40px">All Categories</a></li>
                    <li><a href="{{ route('category.create') }}" style="color: #fff; text-decoration: none; margin-left: 40px">Add New Category</a></li>
                </ul>
            </li>
            <li style="margin-bottom: 10px;">
                <a href="#" onclick="toggleDropdown('productMenu')" style="text-decoration: none; color: #fff;">
                    <i class="sidebar-item-icon fas fa-shopping-bag" style="margin-right: 5px;"></i>
                    <span class="nav-label">Manage Product</span>
                    <i class="fas fa-chevron-down" style="float: right;  margin-top: -15px"></i>
                </a>
                <ul class="collapse list-unstyled" id="productMenu" style="display: none;">
                    <li><a href="{{ route('product.index') }}" style="color: #fff; text-decoration: none; margin-left: 40px">All Products</a></li>
                    <li><a href="{{ route('product.create') }}" style="color: #fff; text-decoration: none; margin-left: 40px">Add New Product</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('order.index') }}" style="text-decoration: none; color: #fff; display: flex; align-items: center;">
                    <i class="fas fa-shopping-basket" style="margin-right: 20px;"></i>
                    <span class="nav-label">Manage Order</span>
                </a>
            </li>            
        </ul>
    </div>
</nav>
