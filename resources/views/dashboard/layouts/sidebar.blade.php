<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3 d-flex flex-column h-100">
      <ul class="nav flex-column">
          <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                  <span data-feather="home"></span>
                  Dashboard
              </a>
          </li>
          <li class="nav-item active">
              <a class="nav-link {{ Request::is('dashboard/products*') ? 'active' : '' }}" href="/dashboard/products">
                  <span data-feather="file-text"></span>
                  Products
              </a>
          </li>
          <li class="nav-item active">
              <a class="nav-link {{ Request::is('dashboard/contacts*') ? 'active' : '' }}" href="/dashboard/contacts">
                  <span data-feather="file-text"></span>
                  Contacts
              </a>
          </li>
          <li class="nav-item active">
              <a class="nav-link {{ Request::is('dashboard/custom-order*') ? 'active' : '' }}" href="/dashboard/custom-order">
                  <span data-feather="file-text"></span>
                  Custom Order
              </a>
          </li>
          <li class="nav-item active">
              <a class="nav-link {{ Request::is('dashboard/checkouts*') ? 'active' : '' }}" href="/dashboard/checkouts">
                  <span data-feather="file-text"></span>
                  Orders
              </a>
          </li>
      </ul>

      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Categories</span>
      </h6>
      <ul class="nav flex-column">
          <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboard/collections/flower*') ? 'active' : '' }}" href="/dashboard/collections/flower">
                  <span data-feather="grid"></span>
                  FlowerType
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboard/collections/new*') ? 'active' : '' }}" href="/dashboard/collections/new">
                  <span data-feather="grid"></span>
                  ProductType
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link {{ Request::is('dashboard/collections/event*') ? 'active' : '' }}" href="/dashboard/collections/event">
                  <span data-feather="grid"></span>
                  EventType
              </a>
          </li>
      </ul>

      <!-- Link Edit Account -->
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Account</span>
      </h6>
      <ul class="nav flex-column">
          <li class="nav-item ">
              <a class="nav-link {{ Request::is('dashboard/account/edit*') ? 'active' : '' }}" href="/dashboard/account/edit">
                  <span data-feather="settings"></span>
                  Account
              </a>
          </li>
      </ul>
  </div>
</nav>
