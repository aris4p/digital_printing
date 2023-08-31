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



      <form action="forms/book-a-table.php" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
        <div class="row">
          <div class="col-lg-6 col-md-6 form-group">
            <input type="text" name="name" class="form-control" id="name" placeholder="Nama Pemesan" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
            <div class="validate"></div>
          </div>
          <div class="col-lg-6 col-md-6 form-group mt-3 mt-md-0">
            <input type="email" class="form-control" name="email" id="email" placeholder="Email Pemesan" data-rule="email" data-msg="Please enter a valid email">
            <div class="validate"></div>
          </div>
          <div class="col-lg-6 col-md-6 form-group mt-3 mt-md-0">


          </div>

          <div class="col-lg-6 col-md-6 form-group mt-3 mt-md-0">
            <select class="form-control" name="printing_type" id="printing_type">
              <option  disabled selected>Pilih Produk</option>
              <option value="kartu_nama">Kartu Nama</option>
              <option value="kop_surat">Kop Surat</option>
              <option value="amplop_surat">Amplop Surat</option>
              <option value="invoice">Invoice</option>
              <option value="brosur">Brosur</option>
              <option value="flyer">Flyer</option>
            </select>
          </div>
          <div class="col-lg-6 col-md-6 form-group mt-3 mt-md-0">
            <input type="number" class="form-control" name="phone" id="phone" placeholder="Nomor Hp Pemesan" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
          </div>
          <div class="col-lg-6 col-md-6 form-group mt-3 mt-md-0">
            <input type="number" class="form-control" name="qty" id="qty" placeholder="Jumlah Pemesanan Minimal 1" data-rule="minlen:1" data-msg="Please enter at least 4 chars">
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
            <span style="color: #a49b89;">Rp. 90000</span>
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
