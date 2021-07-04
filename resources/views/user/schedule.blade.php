<!DOCTYPE html>
<html lang="en">
@include('user.head')
  <body>
@include('user.nav')
    <div class="hero-wrap ftco-degree-bg" style="background-image: url({{asset('annur.jpg')}});" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text justify-content-center align-items-center">
          <div class="col-lg-1 col-md-6 ftco-animate d-flex align-items-end">
            <div class="text text-center">
              <p class="breadcrumbs"><span class="mr-2"><a href="{{url('user/home')}}">Beranda <i class="ion-ios-arrow-forward"></i></a></span> <span>Jadwal <i class="ion-ios-arrow-forward"></i></span></p>
              <h1 class="mb-3 bread" style="font-family: ui-monospace">Jadwal</h1>
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

 <section class="ftco-section ftco-agent">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12 heading-section text-center ftco-animate mb-5">
        <span class="subheading">Our Schedule</span>
        <h2 class="mb-2">Jadwal Acara Masjid Agung An - Nur</h2>
      </div>
    </div>
    <div class="row">
        @foreach($acara as $data)
            <div class="kotak">
                <div class="ktk">
                    <h2 style="color: #95a5a6; ">{{ $data -> tanggal }}</h2>
                </div>
                <div class="kotak2">
                    <h1 style="color: #2ecc71">{{ strtoupper($data -> nama_acara) }}</h1>
                    <p style="font-size: 18pt;margin-top: -2%">{{ strtoupper($data -> nama) }} ( Dengan materi {{ $data -> materi }})</p>
                    <P style="margin-top: -2%;font-size: 10pt;">Waktu	: {{ $data -> waktu_mulai }} - {{ $data -> waktu_selesai }}</P>
                </div>
            </div>
        @endforeach
    </div>
   </div>
 </section>

@include('user.footer')
@include('user.foot')
  </body>
</html>
