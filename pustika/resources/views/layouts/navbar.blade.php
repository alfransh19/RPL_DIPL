<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Pustika | {{$title}}</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">

          <a class="navbar-brand" href="/">Pustika</a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarScroll" >
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
              <li class="nav-item">
                <a class="nav-link {{ ($title === "Home") ? 'active' : ''}}" aria-current="page" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ ($title === "Books") ? 'active' : ''}}" aria-current="page" href="#">Books</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ ($title === "Authors") ? 'active' : ''}}" aria-current="page" href="#">Authors</a>
              </li>
            </ul>

            <ul class="navbar-nav ms-auto">
              @auth
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" 
                  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Welcome back, {{ auth()->user()->name }}
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                    <li><a class="dropdown-item" href="/bookmarks"><i class="bi bi-book"></i> Read </a></li>
                    <li><a class="dropdown-item" href="/cart"><i class="bi bi-cart3"></i> Cart</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                      <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item">
                          <i class="bi bi-box-arrow-in-right"></i> Logout
                        </button>
                      </form>
                    </li>
                  </ul>
                </li>
              @else
                <li class="nav-item">
                    <a href="/login" class="nav-link {{ ($title === "Login") ? 'active' : ''}}"><i class="bi bi-box-arrow-in-left"></i>
                    Login</a>
                </li>
              @endauth
            </ul>

          </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('container')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>