@include('KNTadmin.layouts.header')

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
        @include('KNTadmin.layouts.navbar')
        <main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    @yield('content')
                </div>
            </div>
        </main>
        @include('KNTadmin.layouts.footer')
    </div>
    @include('KNTadmin.layouts.script')
</body>
</html>
