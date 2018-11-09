<!DOCTYPE html>
<html lang="id" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/all.css') }}" rel="stylesheet">
        <link href="{{ asset('css/instagram.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Quill CSS -->
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="container-fluid top-header text-right">
            <span>Hubungi: Angel (08112596097)</span>
        </div>
        <nav class="navbar navbar-expand-lg sticky-top navbar-light">
            <a class="navbar-brand" href="{{ route('home') }}">Produk Organik</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown" id="product">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Produk
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          @foreach($products as $product)
                            <a class="dropdown-item" href="{{ route('product', [$product->id]) }}">{{ $product->product_name }}</a>
                          @endforeach
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="testimony" href="{{ route('testimony') }}">Testimoni</a>
                    </li>
                </ul>
                <span class="navbar-text italic">
                    Buat apa banyak uang tapi hidup sakit-sakitan
                </span>
            </div>
        </nav>
        @yield('content')
        <footer class="footer">
            <div class="text-right">
                Coded with <i class="fa fa-heart text-red" style="margin-right: 0px;"></i> by Kevin Giovanni
            </div>
        </footer>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/instagram.js') }}"></script>

        <!-- Include the Quill library -->
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    </body>
</html>
