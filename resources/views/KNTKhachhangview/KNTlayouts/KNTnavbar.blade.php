<nav class="navbar navbar navbar-expand-lg bg-secondary">
    <div class="container-fluid">
        <div class="col-4"></div>
        <div class="col-4 ">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link text-white px-3" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white px-3" href="#">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white px-3" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white px-3" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    @if (Session::has('login_success'))
                        <a href="" class="nav-link text-light">Logout</a>
                    @else
                        <a href="" class="nav-link text-light">Login</a>
                    @endif
                </li>
            </ul>
        </div>
        <div class="col-4"></div>
    </div>
</nav>
