<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @component('layouts.components.head')
    @endcomponent
</head>
<body>
<!--Main Navigation-->
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item  {{request()->is('/')?'active':''}}">
                    <a class="nav-link" href="/">En</a>
                </li>
                <li  class="nav-item {{request()->is('uk')?'active':''}}">
                    <a class="nav-link" href="/uk">Ua</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!--Main Navigation-->
<div id="app" class="container mt-5">
    @yield('content')
</div>
</body>
</html>
