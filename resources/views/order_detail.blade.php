@extends('layouts.main')
@section('body')

<section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Lacak Pesanan</h2>
        <ol>
          <li><a href="{{ url('/') }}">Home</a></li>
          <li>Lacak Pesanan</li>
        </ol>
      </div>

    </div>
  </section>

  <section class="inner-page book-a-table">
    <div class="container" data-aos="fade-up">
    @include('layouts.partials.errors')


      <form action="{{ route('get_link') }}" method="GET" role="form" class="php-email-form"  enctype="multipart/form-data">
        <div class="row">
          <div class="col-lg-6 col-md-6 form-group">
            <label>Masukan Nomor Invoice</label>
            <input type="text" name="invoice" class="form-control" id="invoice" >
          </div>

        <div class="text-center"><button type="submit">Pesan Sekarang</button></div>
      </form>

    </div>
  </section>

@endsection
