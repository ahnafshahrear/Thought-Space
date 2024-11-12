<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thought Space</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <div class="d-flex">
          <a class="navbar-brand" href="{{ route('posts.index') }}">Home</a>

          {{-- Search field --}}
          <form class="d-flex" role="search" method="GET" action="{{ route('posts.search') }}">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
              <button class="btn btn-outline-light" type="submit">Search</button>
          </form>
        </div>

        {{-- Authenticated user's options --}}
        @auth
            {{-- Dropdown menu button for logged in users --}}
            <div>
                <div class="btn-group">
                    <button type="button" class="btn btn-dark dropdown-toggle navbar-brand" data-bs-toggle="dropdown" aria-expanded="false">
                      {{ auth()->user()->username }}
                    </button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item fw-semibold" href="{{ route('dashboard') }}">Dashboard</a></li>
                      {{-- <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
                      <li><hr class="dropdown-divider"></li>
                      <li>
                        <form action="{{ route('logout') }}" method="post">
                          @csrf
                          <button class="dropdown-item fw-semibold">Logout</button>
                        </form>
                      </li>
                    </ul>
                  </div>
            </div>
        @endauth

        {{-- Guest options --}}
        @guest
            <div>
                <a class="navbar-brand" href="{{ route('login') }}">Login</a>
                <a class="navbar-brand" href="{{ route('register') }}">Register</a>
            </div>
        @endguest
        </div>
      </div>
    </nav>

    <div class="container my-5">
      {{ $slot }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="main.js"></script>
  </body>
</html>