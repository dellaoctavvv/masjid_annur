<!DOCTYPE html>
<html lang="en">
@include('user.head')
  <body>
@include('user.nav')
    <!-- END nav -->
    <div class="hero-wrap ftco-degree-bg" style="background-image: url({{asset('annur.jpg')}});" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text justify-content-center align-items-center">
          <div class="col-lg-1 col-md-6 ftco-animate d-flex align-items-end">
            <div class="text text-center">
              <p class="breadcrumbs"><span class="mr-2"><a href="{{url('user/home')}}">Beranda <i class="ion-ios-arrow-forward"></i></a></span> <span>Kontak <i class="ion-ios-arrow-forward"></i></span></p>
              <h1 class="mb-3 bread" style="font-family: ui-monospace">Kontak</h1>
            </div>
          </div>
        </div>
      </div>
      <div class="mouse">
        <a href="#" class="mouse-icon">
          <div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
        </a>
      </div>
    </div>

    <section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex mb-5 contact-info justify-content-center">
          <div class="col-md-8">
            <div class="row mb-5">
              <div class="col-md-4 text-center py-4">
                <div class="icon">
                  <span class="icon-map-o"></span>
                </div>
                <p><span>Alamat:</span> Jl. Hang Tuah, Sumahilang, Kec. Pekanbaru Kota, Kota Pekanbaru, Riau 28156</p>
              </div>
              <div class="col-md-4 text-center border-height py-4">
                <div class="icon">
                  <span class="icon-mobile-phone"></span>
                </div>
                <p><span>No Telpon:</span> <a href="tel://1234567920"></a></p>
              </div>
              <div class="col-md-4 text-center py-4">
                <div class="icon">
                  <span class="icon-envelope-o"></span>
                </div>
                <p><span>Email:</span> <a href="mailto:info@yoursite.com">masjidrayaannur@gmail.com</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row block-9 justify-content-center mb-5">
          <div class="col-md-8 mb-md-5">
            <h2 class="text-center">Jika Anda punya pertanyaan <br>jangan ragu untuk mengirimi kami pesan</h2>
            <form action="{{ url('user/contact_post') }}" method="post" class="bg-light p-5 contact-form">
                {{ csrf_field() }}
              <div class="form-group">
                <input type="text" class="form-control" name="nama" placeholder="Nama Kamu"required autocomplete="off">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="Email Kamu" required autocomplete="off">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subjek" placeholder="Sabjek" autocomplete="off">
              </div>
              <div class="form-group">
                <textarea cols="30" rows="7" class="form-control" name="pesan" placeholder="Pesan"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Kirim Pesan" class="btn btn-primary py-3 px-5">
              </div>
            </form>

          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-10">
            <!-- <div id="map" class="bg-white"></div> -->
          </div>
        </div>
      </div>
    </section>


@include('layouts.message')
@include('user.footer')
@include('user.foot')

<script src="{{ asset('assets/sweetalert/sweetalert.min.js')}}"></script>
  </body>
</html>
