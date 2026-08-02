<!doctype html>

<head>
    @include('admin.layout.top')
</head>
<body>


    <!-- Left Panel -->
        @include('admin.layout.navigation')


    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        @include('admin.layout.header')
        <!-- Header-->

        @yield('content')

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    @include('admin.layout.bottom')

</body>
</html>
