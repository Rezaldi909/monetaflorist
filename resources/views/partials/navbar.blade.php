<nav class="navbar navbar-expand-lg border-bottom py-3 fw-bold" >
  <div class="container flex-column">
    <!-- Bagian 1: Logo di tengah dan Icon Search serta Cart di sebelah kanan -->
    <div class="d-flex w-100 justify-content-center position-relative">
      <a class="navbar-brand mb-3 text-new" href="/">
        <img src="{{ asset('images/logo.jpg') }}" alt="MONETA Logo" style="height: 40px;">
       </a>
    

      <!-- Icon Search dan Cart -->
      <div class="search-icon position-absolute end-0 d-flex">
        <!-- Search Icon -->
        <button class="btn btn-outline-new me-2" type="button" data-bs-toggle="collapse" data-bs-target="#searchForm" aria-expanded="false" aria-controls="searchForm">
          <i class="bi bi-search"></i>
        </button>

        <!-- Cart Icon -->
        <button class="btn btn-outline-new" type="button" data-bs-toggle="offcanvas" data-bs-target="#cartSidebar" aria-controls="cartSidebar">
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
                <a class="dropdown-item dropdown-toggle text-new" href="/flowers/boquet">Fresh Flowers</a>
                <ul class="dropdown-menu text-new">
                  @foreach ($flowers as $type)
                    <li><a class="dropdown-item text-new" href="{{ route('flowers.products', $type->slug) }}">{{ $type->nama }}</a></li>
                  @endforeach
                </ul>
              </li>
              <!-- Product Dropdown -->
              <li class="dropdown-submenu">
                <a class="dropdown-item dropdown-toggle text-new" href="/collections/new">Product</a>
                <ul class="dropdown-menu text-new">
                  @foreach ($types as $type)
                    <li><a class="dropdown-item text-new" href="{{ route('collections.products', $type->slug) }}">{{ $type->nama }}</a></li>
                  @endforeach
                </ul>
              </li>
              <!-- Event Dropdown -->
              <li class="dropdown-submenu">
                <a class="dropdown-item dropdown-toggle text-new" href="/event/christmast-edition">Event</a>
                <ul class="dropdown-menu text-new">
                  @foreach ($events as $type)
                    <li><a class="dropdown-item text-new" href="{{ route('events.products', $type->slug) }}">{{ $type->nama }}</a></li>
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
            <li class="nav-item mx-2 dropdown float-end s">
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
        <button class="btn btn-outline-new ms-1" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<!-- Offcanvas Sidebar for Cart -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="cartSidebar" aria-labelledby="cartSidebarLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title text-new" id="cartSidebarLabel">YOUR CART</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    @if(session('cart'))
        <ul class="list-group">
            @foreach(session('cart') as $index => $item)
                <li class="list-group-item mb-3 border position-relative">
                  <div class="row">
                    <!-- Icon delete -->
                    <form action="{{ route('cart.delete', $index) }}" method="POST" class="delete-icon">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn p-0 border-0 text-danger float-end" title="Remove Item">
                          <i class="bi bi-x-circle fs-4"></i>
                      </button>
                    </form>
                  

                    <!-- Product Image -->
                    <div class="col-4 col-lg-3 d-flex justify-content-center">
                      <img src="{{ asset('storage/' . $item['image']) }}" alt="Product Image" class="img-fluid rounded" style="max-height: 150px;">
                    </div>

                    <!-- Product Details -->
                    <div class="col-8 col-lg-9">
                      <div class="m-0 p-0">
                        <div class="container" style="font-size: 14px;">
                          <div class="mb-2 text-new">
                            <strong>{{ $item['name'] }}</strong>
                          </div>
                          <div class="text-muted">
                            <span>Delivery Options: {{ $item['delivery_options'] }}</span><br>
                            <span>Delivery Time: {{ $item['delivery_time'] }}</span><br>
                            <span>Delivery Date:</span> {{ \Carbon\Carbon::parse($item['delivery_date'])->format('d/m/Y') }}<br>
                            <span>Sender Name: {{ $item['sender_name'] }}</span><br>
                            <span>Sender Phone: {{ $item['sender_phone'] }}</span><br>
                            <span>From: {{ $item['from'] }}</span><br>
                            <span>To: {{ $item['to'] }}</span><br>
                            <span>Message: {{ $item['message'] }}</span><br>
                          </div>
                          <div class="mt-2 text-new">
                            <strong>Price: {{ $item['price'] }}</strong>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
            @endforeach
        </ul>
        <div class="d-grid gap-2 mt-4">
          <form action="{{ route('cart') }}" method="GET">
            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-new float-end fw-bold">CHECKOUT</button>

            </div>
          </form>
        </div>
    @else
        <p>Your cart is empty.</p>
    @endif
  </div>
</div>




<!-- Tambahkan link ke Bootstrap Icons di bagian <head> dari HTML -->
