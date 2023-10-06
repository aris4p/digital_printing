@extends('layouts.admin.main')
@section('body')

 <!-- Content -->

 <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Data Transaksi</h4>
    <form method="get" action="{{ route('filter') }}" target="">
    <div class="mb-4">
      <label>Periode :</label>
      <input type="date" name="startDate">
      <label>-</label>
      <input type="date" name="endDate">
      <button class="btn btn-primary">Print</button>
    </div>
    </form>
    <!-- Basic Bootstrap Table -->
    <div class="card">
        
    
      @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>ID XENDIT</th>
                <th>EXTERNAL ID</th>
                <th>PRODUCT ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>NO HP</th>
                <th>STATUS</th>
                {{-- <th>AKSI</th> --}}
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            @foreach ($transaksi as $transaction)
                <tr>
                <td>{{ $transaction->id_xendit }}</td>
                <td>{{ $transaction->external_id }}</td>
                <td>{{ $transaction->product_id }}</td>
                <td>{{ $transaction->name }}</td>
                <td>{{ $transaction->email }}</td>
                <td>{{ $transaction->nohp }}</td>
                <td>{{ $transaction->status }}</td>
                {{-- <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('produk-edit', ['id' => $transaction->id_xendit]) }}"
                          ><i class="bx bx-edit-alt me-1"></i> Edit</a
                        >
                        <a class="dropdown-item" href="{{ route('produk-delete', ['id' => $transaction->id_xendit]) }}"
                          ><i class="bx bx-trash me-1"></i> Delete</a
                        >
                      </div>
                    </div>
                  </td> --}}
                </tr>
               
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!--/ Basic Bootstrap Table -->
  </div>
  <!-- / Content -->
    
@endsection