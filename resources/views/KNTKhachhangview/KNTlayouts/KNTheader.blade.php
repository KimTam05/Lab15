<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
</head>
<body>
    <header>
        <div class="container-fluid bg-dark">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-2 py-3">
                    <a href="/">
                        <img src="{{asset('images/cat.png')}}" alt="Logo" height="100">
                    </a>
                </div>
                <div class="col-5 pt-5">
                    <ul class="d-flex" style="list-style-type: none">
                        <li><a href="#" class="text-white text-decoration-none mx-3 fs-4">Facebook</a></li>
                        <li><a href="#" class="text-white text-decoration-none mx-3 fs-4">Youtube</a></li>
                        <li><a href="#" class="text-white text-decoration-none mx-3 fs-4">Github</a></li>
                    </ul>
                </div>
                <div class="col-3 pt-5">
                    <form class="d-flex">
                        <input type="search" role="search" placeholder="Search" class="form-control me-2">
                        <button class="btn btn-outline-secondary"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
                <div class="col-1"></div>
            </div>
        </div>
    </header>
