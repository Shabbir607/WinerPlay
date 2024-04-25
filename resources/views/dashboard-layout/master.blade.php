<!DOCTYPE html>
<html lang="en">

@include('dashboard-layout.head')

<body class="g-sidenav-show  bg-gray-100">

    <!-- Sidebar -->
    @include('user.layouts.sidebar')

        @yield('main-content')


</body>

</html>
