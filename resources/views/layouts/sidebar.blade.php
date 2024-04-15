<div class="sidebar">
    <!-- Sidebar user (optional) -->
    {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
    </div>
    </div> --}}

    <!-- SidebarSearch Form -->
    <div class="form-inline mt-2">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
            <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
            </button>
            </div>
        </div>
        {{-- <div class="sidebar-search-results"><div class="list-group"><a href="#" class="list-group-item"><div class="search-title"><strong class="text-light"></strong>N<strong class="text-light"></strong>o<strong class="text-light"></strong> <strong class="text-light"></strong>e<strong class="text-light"></strong>l<strong class="text-light"></strong>e<strong class="text-light"></strong>m<strong class="text-light"></strong>e<strong class="text-light"></strong>n<strong class="text-light"></strong>t<strong class="text-light"></strong> <strong class="text-light"></strong>f<strong class="text-light"></strong>o<strong class="text-light"></strong>u<strong class="text-light"></strong>n<strong class="text-light"></strong>d<strong class="text-light"></strong>!<strong class="text-light"></strong></div><div class="search-path"></div></a></div></div> --}}
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href= "{{ url('/') }}" class="nav-link {{ ($activeMenu == 'dashboard')? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-header">Data Pengguna</li>
        <li class="nav-item">
            <a href="{{ url('/level') }}" class="nav-link {{ ($activeMenu == 'level')? 'active' : '' }}">
                <i class="nav-icon fas fa-layer-group"></i>
                <p>Level User</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/user') }}" class="nav-link {{ ($activeMenu == 'user')? 'active' : '' }}">
                <i class="nav-icon far fa-user"></i>
                <p>Data User</p>
            </a>
        </li>
        <li class="nav-header">Data Barang</li>
        <li class="nav-item">
            <a href="{{ url('/category') }}" class="nav-link {{ ($activeMenu == 'category')? 'active' : '' }}">
                <i class="nav-icon fas fa-bookmark"></i>
                <p>Category Barang</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/item') }}" class="nav-link {{ ($activeMenu == 'item')? 'active' : '' }}>
                <i class="nav-icon far fa-list-alt"></i>
                <p>Goods Data</p>
            </a>
        </li>
        <li class="nav-header">Data Transaksi</li>
        <li class="nav-item">
            <a href="{{ url('/stok') }}" class="nav-link {{ ($activeMenu == 'stok')? 'active' : '' }}>
                <i class="nav-icon far fa-cubes"></i>
                <p>Stock of Goods</p>
            </a> 
        </li>
        <li class="nav-item">
            <a href="{{ url('/item') }}" class="nav-link {{ ($activeMenu == 'sales')? 'active' : '' }}>
                <i class="nav-icon far fa-cash-register"></i>
                <p>Transaction</p>
            </a>
        </li>
    </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>