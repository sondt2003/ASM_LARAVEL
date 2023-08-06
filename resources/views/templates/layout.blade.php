<!DOCTYPE html>
<html>
<head>
    <title>Layout Bootstrap </title>
    <!-- <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>

<!-- Menu -->
<div class="">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <a class="navbar-brand" href="http://127.0.0.1:8000/login">Login</a>
    <a class="navbar-brand" href="http://127.0.0.1:8000/register">Register</a>
    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button> -->
    <div class="collapse navbar-collapse " id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="http://127.0.0.1:8000/product">Sản phầm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://127.0.0.1:8000/banner">Banner</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://127.0.0.1:8000/category">Danh mục</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://127.0.0.1:8000/sale">Sale</a>
            </li>
        </ul>
    </div>
</nav>
</div>

<!-- Nội dung -->
<div class="container mt-4">
    @include('templates.error')
    @yield('content')
</div>

<!-- Footer -->
<footer class="bg-light text-center mt-4 py-2">
    <p></p>
</footer>
<!-- <script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('libs/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.js') }}"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
@yield('script')

</body>
</html>