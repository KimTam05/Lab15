<nav class="app-header navbar navbar-expand bg-body"> <!--begin::Container-->
    <div class="container-fluid"> <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
            <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> <i class="bi bi-list"></i> </a> </li>
            <li class="nav-item d-none d-md-block"> <a href="{{ route('KNTadmin.index') }}" class="nav-link">Trang chủ</a> </li>
        </ul> <!--end::Start Navbar Links--> <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto"> <!--begin::Navbar Search-->
            <li class="nav-item user-menu"> <a href="#" class="nav-link"> <img src="{{ asset('img/user2-160x160.jpg') }}" class="user-image rounded-circle shadow" alt="User Image"> <span class="d-none d-md-inline">{{ Session::get('KNTQuanTri') }}</span> </a>
            </li>
            <li class="user-body"> <!--begin::Row-->
                <a href="{{ route('KNTadmin.logout') }}" class="btn btn-danger btn-flat float-end">Đăng xuất</a>
            </li>  <!--end::User Menu Dropdown-->
        </ul> <!--end::End Navbar Links-->
    </div> <!--end::Container-->
</nav>
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
    <div class="sidebar-brand"> <!--begin::Brand Link--> <a href="{{ route('KNTadmin.index')}}" class="brand-link"> <!--begin::Brand Image--> <img src="{{asset('img/AdminLTELogo.png')}}" alt="Admin Logo" class="brand-image opacity-75 shadow"> <!--end::Brand Image--> <!--begin::Brand Text--> <span class="brand-text fw-light">Admin Page</span> <!--end::Brand Text--> </a> <!--end::Brand Link--> </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-header">TRANG CHỦ</li>
                <li class="nav-item"> <a href="{{ route('KNTadmin.index') }}" class="nav-link"> <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-header">QUẢN TRỊ VIÊN</li>
                <li class="nav-item"> <a href="{{ route('KNTadmin.KNTQuanTri.index') }}" class="nav-link"> <i class="nav-icon bi bi-circle-fill"></i></i>
                        <p>Danh sách quản trị viên</p>
                    </a>
                </li>
                <li class="nav-item"> <a href="{{ route('KNTadmin.KNTQuanTri.create') }}" class="nav-link"> <i class="nav-icon bi bi-circle-fill"></i>
                        <p>Thêm mới quản trị viên</p>
                    </a>
                </li>
                <li class="nav-header">LOẠI SẢN PHẨM</li>
                <li class="nav-item"> <a href="{{ route('KNTadmin.KNTLoaiSP.index') }}" class="nav-link"> <i class="nav-icon bi bi-circle-fill"></i>
                        <p>Danh sách loại sản phẩm</p>
                    </a> </li>
                <li class="nav-item"> <a href="{{ route('KNTadmin.KNTLoaiSP.create') }}" class="nav-link"> <i class="nav-icon bi bi-circle-fill"></i>
                        <p>Thêm mới loại sản phẩm</p>
                    </a> </li>
                <li class="nav-header">SẢN PHẨM</li>
                <li class="nav-item"> <a href="{{ route('KNTadmin.KNTSanpham.index') }}" class="nav-link"> <i class="nav-icon bi bi-circle-fill"></i>
                        <p>Danh sách sản phẩm</p>
                    </a> </li>
                <li class="nav-item"> <a href="{{ route('KNTadmin.KNTSanpham.create') }}" class="nav-link"> <i class="nav-icon bi bi-circle-fill"></i>
                        <p>Thêm mới sản phẩm</p>
                    </a>
                </li>
                <li class="nav-header">KHÁCH HÀNG</li>
                <li class="nav-item"> <a href="{{ route('KNTadmin.KNTKhachhang.index') }}" class="nav-link"> <i class="nav-icon bi bi-circle-fill"></i>
                        <p>Danh sách khách hàng</p>
                    </a> </li>
                <li class="nav-item"> <a href="{{ route('KNTadmin.KNTKhachhang.create') }}" class="nav-link"> <i class="nav-icon bi bi-circle-fill"></i>
                        <p>Thêm mới khách hàng</p>
                    </a>
                </li>
                <li class="nav-header">GIỎ HÀNG</li>
                <li class="nav-item"> <a href="{{ route('KNTadmin.KNTGiohang.index') }}" class="nav-link"> <i class="nav-icon bi bi-circle-fill"></i>
                        <p>Danh sách giỏ hàng</p>
                    </a> </li>
                <li class="nav-item"> <a href="{{ route('KNTadmin.KNTCTGiohang.index') }}" class="nav-link"> <i class="nav-icon bi bi-circle-fill"></i>
                        <p>Chi tiết giỏ hàng</p>
                    </a>
                </li>
            </ul> <!--end::Sidebar Menu-->
        </nav>
    </div> <!--end::Sidebar Wrapper-->
</aside>
