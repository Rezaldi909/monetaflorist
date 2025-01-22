@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Orders</h1>  
</div>

@if (@session()->has('success'))
<div class="alert alert-primary col-lg-11" role="alert">
  {{ session('success') }}  
</div>  
@endif

<a href="{{ route('orders.pdf') }}" class="btn btn-secondary mb-3">Download PDF</a>

<div class="d-flex justify-content-between align-items-center mb-3">
  <form action="{{ route('checkouts.index') }}" method="GET" class="d-flex align-items-center gap-2 w-100" id="filter-form">
      <!-- Filter Status -->
      <select name="status" class="form-select form-select-sm w-auto" onchange="handleFilterChange(this)">
          <option value="" {{ request('status') === null ? 'selected' : '' }}>All</option>
          <option value="Pending" {{ request('status') === 'Pending' ? 'selected' : '' }}>Pending</option>
          <option value="Processed" {{ request('status') === 'Processed' ? 'selected' : '' }}>Processed</option>
          <option value="Completed" {{ request('status') === 'Completed' ? 'selected' : '' }}>Completed</option>
      </select>

      <!-- Search Input -->
      <input 
          type="text" 
          name="search" 
          class="form-control form-control-sm w-auto" 
          placeholder="Search..." 
          value="{{ request('search') }}" 
          onkeydown="if(event.key === 'Enter') this.form.submit()"
      >
  </form>
</div>

    <table class="table table-striped table-sm" style="font-size: 1em;">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Email</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Address</th>
          <th scope="col">Phone</th>
          <th scope="col">Status</th>

        </tr>
      </thead>
      <tbody>
        @foreach ( $orders as $order )
        <tr>
        <td>{{ $orders->perPage() * ($orders->currentPage() - 1) + $loop->iteration }}</td> 
          <td>{{ $order->email }}</td>
          <td>{{ $order->first_name }}</td>
          <td>{{ $order->last_name }}</td>
          <td>{{ $order->address }}</td>
          <td>{{ $order->phone }}</td>
          <td>
            <span class="badge 
                        {{ 
                            $order->status == 'Pending' ? 'bg-secondary' : 
                            ($order->status == 'Processed' ? 'bg-warning' : 
                            ($order->status == 'Completed' ? 'bg-success' : 'bg-secondary')) 
                        }}">
                        {{ $order->status ?? 'None' }}
                    </span>
          </td>
          <td>
            <a href="{{ route('checkouts.show', $order->id) }}" class="badge bg-info">
                <span data-feather="eye"></span>
            </a>            
            <a href="{{ route('checkouts.edit', $order->id) }}" class="badge bg-warning">
                <span data-feather="edit"></span>
            </a>            
            <form action="/dashboard/checkouts/{{ $order->id }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="d-flex justify-content-end">
        {{ $orders->appends(['search' => request('search')])->links() }}
    </div>
</div>

@endsection

<script>
  function handleFilterChange(select) {
      if (select.value === "") {
          // Redirect to the route without query parameters
          window.location.href = "{{ route('checkouts.index') }}";
      } else {
          // Submit the form normally
          document.getElementById('filter-form').submit();
      }
  }
</script>