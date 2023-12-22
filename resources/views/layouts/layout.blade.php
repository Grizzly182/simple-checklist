<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <title>Simple Checklist</title>
</head>

<body>
    @csrf
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Навигация">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Главная</a>
                    </li>
                </ul>

            </div>

            <ul class="navbar-nav mb-2 mt-10 mb-lg-0">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('auth.logout') }}">Выйти</a></li>
                        </ul>
                    </li>
                @endauth
                @guest
                    <li class="nav-item">
                        <ul class="navbar-nav">
                            <li class="nav-item me-2">
                                <a class="btn btn-light justify-content-center d-flex" role="button"
                                    href="{{ route('auth.github') }}"><img class="me-1" alt="GitHub" width="25"
                                        src="https://www.svgrepo.com/show/512317/github-142.svg" alt="GitHub">Войти
                                    через GitHub</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-primary justify-content-center d-flex" role="button"
                                    href="{{ route('auth.vk') }}"><img class="me-1" alt="Vk" width="25"
                                        src="https://kataliti.ru/wp-content/uploads/2021/01/vk.png" alt="VK">Войти
                                    через VK</a>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>

    @guest
        <div class="container h-100">
            @yield('content')
        </div>
    @endguest
</body>

</html>
