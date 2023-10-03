@extends('layouts.admin.main')
@section('body')

 <!-- Content -->

 <div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Data Produk</h4>
    <div class="mb-4">
        <a href="{{ route('produk-tambah') }}" class="btn btn-primary">Tambah</a>
    </div>
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
                <th>ID PRODUK</th>
                <th>NAMA PRODUK</th>
                <th>HARGA PRODUK</th>
                <th>AKSI</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            @foreach ($produk as $products)
                <tr>
                <td>{{ $products->id_product }}</td>
                <td>{{ $products->nama_product }}</td>
                <td>{{ $products->harga_product }}</td>
                <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('produk-edit', ['id' => $products->id_product]) }}"
                          ><i class="bx bx-edit-alt me-1"></i> Edit</a
                        >
                        <a class="dropdown-item" href="{{ route('produk-delete', ['id' => $products->id_product]) }}"
                          ><i class="bx bx-trash me-1"></i> Delete</a
                        >
                      </div>
                    </div>
                  </td>
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