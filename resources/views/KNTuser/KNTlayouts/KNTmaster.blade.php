@include('KNTuser.KNTlayouts.KNTheader')

<body>
    @include('KNTuser.KNTlayouts.KNTnavbar')
    <div class="container">
        @yield('content')
    </div>
    @include('KNTuser.KNTlayouts.KNTfooter')
</body>
