@extends('layouts.admin.main')
@section('body')

<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Produk/</span> Tambah</h4>
  
  <!-- Basic Layout -->
  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        
        <div class="card-body">
          @if(session()->has('errors'))
          <div class="alert alert-danger alert-dismissible dade show" role="alert">
            {{ session('errors') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
          <form method="post" action="{{ route('produk-create') }}">
            @csrf
            <div class="mb-3">
              <label class="form-label" for="id_produk">ID Produk</label>
              <input type="text" class="form-control" id="id_produk" name="id_produk" placeholder="ID" />
            </div>
            <div class="mb-3">
              <label class="form-label" for="nama_produk">Nama Produk</label>
              <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Nama" />
            </div>
            <div class="mb-3">
              <label class="form-label" for="harga_produk">Harga Produk</label>
              <input type="text" class="form-control" id="harga_produk" name="harga_produk" placeholder="Harga" />
            </div>
            
            <button type="submit" class="btn btn-primary">Tambah</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- / Content -->

@endsection