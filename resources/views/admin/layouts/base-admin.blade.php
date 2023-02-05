<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts DELETE AFTER STYLING-->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="admin-sidebar close">
            <header>
                <div class="image-text">
                    <span class="image">
                        <i class='bx bxs-user-rectangle icon'></i>
                    </span>

                    <div class="text header-text">
                        <span class="name">{{ Auth::user()->name }}</span>
                        <span class="profession">Admin</span>
                    </div>
                </div>

                <i class='bx bxs-chevron-right toggle'></i>
            </header>

            <div class="menu-bar">
                <div class="menu">
                    <li class="search-box">
                        <i class='bx bx-search icon'></i>
                        <input type="search" placeholder="Cerca...">
                    </li>

                    <ul class="menu-links">
                        <li class="my-nav-link">
                            <a href="{{ route('admin.dashboard') }}">
                                <i class='bx bx-home-alt icon'></i>
                                <span class="text nav-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="my-nav-link">
                            <a href="{{ route('admin.posts.index') }}">
                                <i class='bx bx-list-ul icon'></i>
                                <span class="text nav-text">Editor Post</span>
                            </a>
                        </li>
                        <li class="my-nav-link">
                            <a href="{{ route('admin.posts.create') }}">
                                <i class='bx bx-list-plus icon'></i>
                                <span class="text nav-text">Nuovo Post</span>
                            </a>
                        </li>
                        <li class="my-nav-link">
                            <a href="{{ route('admin.categories.index') }}">
                                <i class='bx bx-category icon'></i>
                                <span class="text nav-text">Categorie</span>
                            </a>
                        </li>
                        <li class="my-nav-link">
                            <a href="{{ route('admin.tags.index') }}">
                                <i class='bx bx-purchase-tag-alt icon'></i>
                                <span class="text nav-text">Tags</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="bottom-content">
                    <li class="">
                        <a href="#">
                            <i class='bx bx-log-out icon'></i>
                            <span class="text nav-text">Logout</span>
                        </a>
                    </li>

                    <li class="mode">
                        <div class="theme-mode">
                            <i class='bx bx-moon icon moon'></i>
                            <i class='bx bx-sun icon sun'></i>
                        </div>
                        <span class="mode-text text">Dark Mode</span>

                        <div class="toggle-switch">
                            <span class="switch"></span>
                        </div>
                    </li>
                </div>
            </div>

        </nav>

        <main class="admin-main">
            @yield('content')
        </main>
    </div>
</body>
</html>
