@include('KNTadmin.KNTlayouts.KNTheader')

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
        @include('KNTadmin.KNTlayouts.KNTnavbar')
        <main class="app-main"> <!--begin::App Content Header-->
            <div class="app-content-header"> <!--begin::Container-->
                <div class="container-fluid"> <!--begin::Row-->
                    @yield('content')
                </div>
            </div>
        </main>
        @include('KNTadmin.KNTlayouts.KNTfooter')
    </div>
    @include('KNTadmin.KNTlayouts.KNTscript')
</body>
</html>
