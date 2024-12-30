@include('KNTadmin.KNTlayouts.KNTheader')

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
        @include('KNTadmin.KNTlayouts.KNTnavbar')
        <main class="app-main">
            <div class="app-content-header">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </main>
        @include('KNTadmin.KNTlayouts.KNTfooter')
    </div>
    @include('KNTadmin.KNTlayouts.KNTscript')
</body>
</html>
