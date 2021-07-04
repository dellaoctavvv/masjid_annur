<!DOCTYPE html>
<html lang="en">
@include('user.head')
<style>
    .agent .desc {
        position: relative;
        width: 85%;
        padding: 20px;
        margin-top: -50px;
        margin-left: 20px;
        background: #2ecc71;
        color: white;
    }
</style>
  <body>
@include('user.nav')
    <div class="hero-wrap ftco-degree-bg" style="background-image: url({{asset('annur.jpg')}});" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text justify-content-center align-items-center">
          <div class="col-lg-1 col-md-6 ftco-animate d-flex align-items-end">
            <div class="text text-center">
              <p class="breadcrumbs"><span class="mr-2"><a href="{{url('user/home')}}">Beranda <i class="ion-ios-arrow-forward"></i></a></span> <span>Pengurus <i class="ion-ios-arrow-forward"></i></span></p>
              <h1 class="mb-3 bread" style="font-family: ui-monospace">Pengurus</h1>
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
            <span class="subheading">Our Agent</span>
            <h2 class="mb-2">Data Anggota Masjid Agung An - Nur Pekanbaru</h2>
        </div>
        </div>
        <div class="row">
            @foreach($anggota as $data)
                <div class="col-md-3">
                    <div class="agent">
                        <div class="img">
                            <img style="height: 200px; width: 200px" src="{{asset('foto-anggota')}}/{{ $data -> foto }}" class="img-fluid" alt="Colorlib Template">
                        </div>
                        <div class="desc">
                            <h3 style="color: white;">{{ $data -> nama }}</h3>
                            <p class="h-info"><span class="location">{{ $data -> alamat }}</span> <span class="details">&mdash; {{ $data -> gaji -> jabatan }}</span></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </section>

    <section class="ftco-section ftco-agent">
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-12 heading-section text-center ftco-animate mb-5">
            <h2 class="mb-2">Data Ustadz Masjid Agung An - Nur Pekanbaru</h2>
        </div>
        </div>
        <div class="row">
            @foreach($ustadz as $data)
                <div class="col-md-3">
                    <div class="agent">
                    <div class="img">
                        <img style="height: 200px; width: 200px" src="{{asset('foto-ustadz')}}/{{ $data -> foto }}" class="img-fluid" alt="Colorlib Template">
                    </div>
                    <div class="desc">
                        <h3 style="color: white;">{{ $data -> nama }}</h3>
                        <p class="h-info"><span class="location">{{ $data -> alamat }}</span>
                    </div>
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
