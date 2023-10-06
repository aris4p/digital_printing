  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-center justify-content-md-between">

      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-phone d-flex align-items-center"><span>+62 896 7476 1189</span></i>
        <i class="bi bi-clock d-flex align-items-center ms-4"><span> Senin-Sabtu: 09:00 Pagi - 20:00 Malam</span></i>
      </div>

      <div class="languages d-none d-md-flex align-items-center">
        <ul>
          {{-- <li>En</li>
          <li><a href="#">De</a></li> --}}
        </ul>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="{{ url('/') }}">Digital Printing</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="{{ asset ('assets/img/logo.png') }}" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <div class="d-flex">

          <a href="{{ route('order') }}" class="book-a-table-btn scrollto d-none d-lg-flex">Pesan Sekarang</a>
          <a href="{{ route('lacak_pesanan') }}" class="book-a-table-btn scrollto d-none d-lg-flex">Lacak Pesanan</a>
        </div>



    </div>
  </header><!-- End Header -->
