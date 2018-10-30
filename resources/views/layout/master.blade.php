<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>One Page App</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-lg navbar-light bg-blue-darker">
                <a class="navbar-brand" href="#">One Page App</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <router-link to='/' class="text-blue hover:text-blue-darker nav-link" exact>Home</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to='/about' class="text-blue hover:text-blue-darker nav-link">About</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to='/contact' class="text-blue hover:text-blue-darker nav-link">Contact</router-link>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container">
                <router-view></router-view>
            </div>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
