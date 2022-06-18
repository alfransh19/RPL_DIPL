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
      </ul>

      @auth
      <div style="width: 500px">
        <form action="/" class="d-flex">
          <input class="form-control me-2" name="search" type="search" placeholder="Search by book title..." aria-label="Search" value="{{request('search')}}">
          <button class="btn btn-outline-success btn-light" type="submit">Search</button>
        </form>
      </div>
      @endauth

      <ul class="navbar-nav ms-auto">
        @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" 
            role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome back, {{ auth()->user()->username }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
              <li><a class="dropdown-item" href="/bookmarks"><i class="bi bi-book"></i> Read </a></li>
              <li><a class="dropdown-item" href="/cart"><i class="bi bi-cart3"></i> Cart</a></li>
              @if (auth()->user()->isAdmin == true)
              <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-clipboard-data"></i> Dashboard</a></li>
              @endif
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