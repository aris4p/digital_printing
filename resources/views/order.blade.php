@extends('layouts.main')
@section('body')

<section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Pesan Order</h2>
        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Pesan</li>
        </ol>
      </div>

    </div>
  </section>

  <section class="inner-page book-a-table">
    <div class="container" data-aos="fade-up">
    @include('layouts.partials.errors')


      <form action="{{ route('payment') }}" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-lg-6 col-md-6 form-group">
            <input type="text" name="name_customer" value="{{ old('name_customer') }}" class="form-control" id="name_customer" placeholder="Nama Pemesan" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
            <div class="validate"></div>
          </div>
          <div class="col-lg-6 col-md-6 form-group mt-3 mt-md-0">
            <input type="email_customer" class="form-control" name="email" value="{{ old('email') }}" id="email" placeholder="Email Pemesan" data-rule="email" data-msg="Please enter a valid email">
            <div class="validate"></div>
          </div>
          <div class="col-lg-6 col-md-6 form-group mt-3 mt-md-0">


          </div>

          <div class="col-lg-6 col-md-6 form-group mt-3 mt-md-0">
            <select class="form-control" name="product" id="product" value="{{ old('product') }}">
              <option  disabled selected>Pilih Produk</option>
              @foreach ($product as $produk)
              <option value="{{ $produk->id_product }}" {!! old('product') == 'kartu_nama' ? 'selected' : '' !!}>{{ $produk->nama_product }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-lg-6 col-md-6 form-group mt-3 mt-md-0">
            <input type="number" class="form-control" name="no_hp" value="{{ old('no_hp') }}" id="no_hp" placeholder="Nomor Hp Pemesan" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
          </div>
          <div class="col-lg-6 col-md-6 form-group mt-3 mt-md-0">
            <input type="number" class="form-control" name="qty" value="{{ old('qty') }}" id="qty" placeholder="Jumlah Pemesanan Minimal 1" data-rule="minlen:1" data-msg="Please enter at least 4 chars">
          </div>
          <div class="col-lg-6 col-md-6 form-group mt-3 mt-md-0">
            <label style="color: #a49b89;">Upload Design : </label>
            <input type="file" name="file" id="file">
          </div>
          <div class="col-lg-6 col-md-6 form-group mt-3 mt-md-0">

          </div>
          <div class="col-lg-6 col-md-6 form-group mt-3 mt-md-0"></div>
          <div class="col-lg-6 col-md-6 form-group mt-3 mt-md-0">
            <label style="color: #a49b89;">Total harga :</label>
            <input type="hidden" name="amount" value="">
            <span style="color: #a49b89;"></span>
          </div>

        </div>
        <div class="form-group mt-3">
          <textarea class="form-control" name="message" rows="5" placeholder="Pesan Detail"></textarea>
          <div class="validate"></div>
        </div>
        <div class="text-center"><button type="submit">Pesan Sekarang</button></div>
      </form>

    </div>
  </section>

@endsection
