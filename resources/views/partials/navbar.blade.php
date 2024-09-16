<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container flex-column">
    <!-- Bagian 1: Logo dan Icon Search -->
    <div class="d-flex justify-content-between w-100">
      <div class="spacer"></div>
      <a class="navbar-brand" href="/">MONETA</a>

      <!-- Icon Search -->
      <div class="search-icon">
        <button class="btn btn-outline-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#searchForm" aria-expanded="false" aria-controls="searchForm">
          <i class="bi bi-search"></i>
        </button>
      </div>
    </div>

    <!-- Toggler untuk tampilan mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <div class="d-flex flex-column ">
        <!-- Bagian 2: Link -->
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'Home') ? 'active' : '' }}" aria-current="page" href="/">HOME</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle {{ ($title === 'Products') ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              PRODUCTS
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <!-- Fresh Flowers Dropdown -->
              <li class="dropdown-submenu">
                <a class="dropdown-item dropdown-toggle" href="#">Fresh Flowers</a>
                <ul class="dropdown-menu">
                  @foreach ($flowers as $type)
                    <li><a class="dropdown-item" href="{{ route('flowers.products', $type->slug) }}">{{ $type->nama }}</a></li>
                  @endforeach
                </ul>
              </li>
              <!-- Product Dropdown -->
              <li class="dropdown-submenu">
                <a class="dropdown-item dropdown-toggle" href="#">Product</a>
                <ul class="dropdown-menu">
                  @foreach ($types as $type)
                    <li><a class="dropdown-item" href="{{ route('collection.products', $type->slug) }}">{{ $type->nama }}</a></li>
                  @endforeach
                </ul>
              </li>
              <!-- Event Dropdown -->
              <li class="dropdown-submenu">
                <a class="dropdown-item dropdown-toggle" href="#">Event</a>
                <ul class="dropdown-menu">
                  @foreach ($events as $type)
                    <li><a class="dropdown-item" href="{{ route('event.products', $type->slug) }}">{{ $type->nama }}</a></li>
                  @endforeach
                </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'Custom Order') ? 'active' : '' }}" href="/custom-order">CUSTOM ORDER</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'About Us') ? 'active' : '' }}" href="/about">ABOUT US</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === 'Contact') ? 'active' : '' }}" href="/contact">CONTACT</a>
          </li>

          @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                ADMIN
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> Dashboard</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right">
                    </i> Logout</button>
                  </form>
                </li>
              </ul>
            </li>
          @else
          @endauth
          
        </ul>
      </div>
    </div>

  
    <!-- Search form, collapsible -->
    <div class="collapse container-fluid mt-3" id="searchForm">
      <form class="d-flex" action="/products">
        <input type="text" class="form-control" placeholder="S E A R C H . . ." name="search" value="{{ request('search') }}">
        <button class="btn btn-outline-success ms-1" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<!-- Tambahkan link ke Bootstrap Icons di bagian <head> dari HTML -->
