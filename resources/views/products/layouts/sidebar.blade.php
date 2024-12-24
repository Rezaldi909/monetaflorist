<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar overflow-visible">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-2 text-muted">
                <span>FRESH FLOWERS</span>
            </h6>
            @foreach ($flowers as $type)
            <li><a class="nav-link text-muted" href="{{ route('flowers.products', $type->slug) }}">{{ $type->nama }}</a></li>
            @endforeach
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-2 text-muted">
            <span>PRODUCTS</span>
        </h6>
        <ul class="nav flex-column">
            @foreach ($types as $type)
            <li><a class="nav-link text-muted" href="{{ route('collections.products', $type->slug) }}">{{ $type->nama }}</a></li>
            @endforeach
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-2 text-muted">
            <span>EVENTS</span>
        </h6>
        <ul class="nav flex-column">
            @foreach ($events as $type)
            <li><a class="nav-link text-muted" href="{{ route('events.products', $type->slug) }}">{{ $type->nama }}</a></li>
            @endforeach
        </ul>
    </div>
</nav>
