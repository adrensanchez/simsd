<!doctype html>
<html>
    <head>
        @include('includes.header')
    </head>
<body>
<div class="container">
    <!-- Header -->
    <header class="row">
    </header>
    
    <!-- Content -->
    <div id="main" class="row">
        <div class="container">
            @yield('content')
        </div>
    </div>

</div>

<!-- Footer -->
    @include('includes.footer')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
</body>
</html>