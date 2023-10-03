@extends('layouts.admin.main')
@section('body')

<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Produk/</span> Edit</h4>
  
  <!-- Basic Layout -->
  <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        
        <div class="card-body">
          @if(session()->has('error'))
          <div class="alert alert-danger alert-dismissible dade show" role="alert">
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
          @if(session()->has('errors'))
          <div class="alert alert-danger alert-dismissible dade show" role="alert">
            {{ session('errors') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
         

          <form method="post" action="{{ route('produk-update', ['id' => $produk->id_product]) }}">
            @csrf
            <div class="mb-3 form-inline">
              <label class="form-label" for="id_produk">ID Produk</label>
              <input type="text" class="form-control" id="id_produk" name="id_produk" placeholder="ID"  value="{{ $produk->id_product }}" readonly />
              <button type="button" class="btn btn-outline-warning" id="ubahId">Ubah Id Produk</button>
            </div>
            <div class="mb-3">
              <label class="form-label" for="nama_produk">Nama Produk</label>
              <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Nama"  value="{{ $produk->nama_product }}"/>
            </div>
            <div class="mb-3">
              <label class="form-label" for="harga_produk">Harga Produk</label>
              <input type="text" class="form-control" id="harga_produk" name="harga_produk" placeholder="Harga" value="{{ $produk->harga_product }}" />
            </div>
            
            <button type="submit" class="btn btn-primary">Perbarui</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- / Content -->

<script>
     // Ambil elemen-elemen yang dibutuhkan
    const idProdukInput = document.getElementById('id_produk');
    const editButton = document.getElementById('ubahId');

    // Tambahkan event listener pada tombol Edit
    editButton.addEventListener('click', function() {
        // Hapus atribut readonly saat tombol "Edit" diklik
        idProdukInput.removeAttribute('readonly');
        idProdukInput.focus(); // Fokuskan ke input
    });
</script>
@endsection