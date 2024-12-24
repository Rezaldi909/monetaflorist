<nav class="navbar navbar-expand-lg border-bottom py-3" >
  <div class="container flex-column">
    <!-- Bagian 1: Logo di tengah dan Icon Search serta Cart di sebelah kanan -->
    <div class="d-flex w-100 justify-content-center position-relative">
      <a class="navbar-brand mb-3 text-new" href="/">MONETA</a>

      <!-- Icon Search dan Cart -->
      <div class="search-icon position-absolute end-0 d-flex">
        <!-- Search Icon -->
        <button class="btn btn-outline-secondary me-2" type="button" data-bs-toggle="collapse" data-bs-target="#searchForm" aria-expanded="false" aria-controls="searchForm">
          <i class="bi bi-search"></i>
        </button>

        <!-- Cart Icon -->
        <button class="btn btn-outline-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#cartSidebar" aria-controls="cartSidebar">
          <i class="bi bi-cart"></i>
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
          <li class="nav-item mx-2">
            <a class="nav-link text-new {{ ($title === 'Home') ? 'active' : '' }}" aria-current="page" href="/">HOME</a>
          </li>
          <li class="nav-item mx-2 dropdown">
            <a class="nav-link dropdown-toggle text-new  fw-bold{{ ($title === 'Products') ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              PRODUCTS
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <!-- Fresh Flowers Dropdown -->
              <li class="dropdown-submenu">
                <a class="dropdown-item dropdown-toggle text-new" href="#">Fresh Flowers</a>
                <ul class="dropdown-menu">
                  @foreach ($flowers as $type)
                    <li><a class="dropdown-item" href="{{ route('flowers.products', $type->slug) }}">{{ $type->nama }}</a></li>
                  @endforeach
                </ul>
              </li>
              <!-- Product Dropdown -->
              <li class="dropdown-submenu">
                <a class="dropdown-item dropdown-toggle text-new" href="#">Product</a>
                <ul class="dropdown-menu text-new">
                  @foreach ($types as $type)
                    <li><a class="dropdown-item text-new" href="{{ route('collections.products', $type->slug) }}">{{ $type->nama }}</a></li>
                  @endforeach
                </ul>
              </li>
              <!-- Event Dropdown -->
              <li class="dropdown-submenu">
                <a class="dropdown-item dropdown-toggle text-new" href="#">Event</a>
                <ul class="dropdown-menu">
                  @foreach ($events as $type)
                    <li><a class="dropdown-item" href="{{ route('events.products', $type->slug) }}">{{ $type->nama }}</a></li>
                  @endforeach
                </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link text-new {{ ($title === 'Custom Order') ? 'active' : '' }}" href="/custom-order">CUSTOM ORDER</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link text-new {{ ($title === 'About Us') ? 'active' : '' }}" href="/about">ABOUT US</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link text-new {{ ($title === 'Contact') ? 'active' : '' }}" href="/contact">CONTACT</a>
          </li>

          @auth
            <li class="nav-item mx-2 dropdown">
              <a class="nav-link dropdown-toggle text-new" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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

<!-- Offcanvas Sidebar for Cart -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="cartSidebar" aria-labelledby="cartSidebarLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="cartSidebarLabel">Your Cart</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    @if(session('cart'))
            <ul class="list-group">
                @foreach(session('cart') as $item)
                    <li class="list-group-item">
                      <div class="row">
                        <div class="col-lg-6">
                          <img src="{{ asset('storage/' . $item['photo']) }}" alt="Product Image" style="width: 150px; height: 200px;">                     
                        </div>
                        <div class="col-lg-6">
                          <div class=" m-0 p-0">
                            <div class="container justify-content-center" style="font-size: 15px">
                              <span>{{ $item['name'] }}</span>
                              <span>Delivery Options: {{ $item['delivery_options'] }}</span>
                              <span>delivery date: {{ $item['delivery_time'] }}</span>
                              <span>delivery time: {{ $item['delivery_time'] }}</span>
                              <span>name: {{ $item['sender_name'] }}</span>
                              <span>phone: {{ $item['sender_phone'] }}</span>
                              <span>from: {{ $item['from'] }}</span>
                              <span>to: {{ $item['to'] }}</span>
                              <span>message: {{ $item['message'] }}</span>
                              <span>Price: {{ $item['price'] }}</span>
                            </div>
                          </div>
                        </div>  
                      </div>
                    </li>
                @endforeach
            </ul>
            <div class="d-grid gap-2 m-3">
              <form action="{{ route('cart') }}" method="GET">
                <button type="submit" class="btn btn-success mt-3">Checkout</button>
            </form>
            </div>

        @else
            <p>Your cart is empty.</p>
        @endif


  </div>
</div>



<!-- Tambahkan link ke Bootstrap Icons di bagian <head> dari HTML -->
