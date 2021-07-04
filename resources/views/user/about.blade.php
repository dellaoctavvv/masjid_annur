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
              <p class="breadcrumbs"><span class="mr-2"><a href="{{url('user/home')}}">Beranda <i class="ion-ios-arrow-forward"></i></a></span> <span>Tentang <i class="ion-ios-arrow-forward"></i></span></p>
              <h1 class="mb-3 bread" style="font-family: ui-monospace">Tentang</h1>
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

    <section class="ftco-section ftco-no-pb">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/bck.png);">
          </div>
          <div class="col-md-6 wrap-about py-md-5 ftco-animate">
            <div class="heading-section p-md-5">
              <h2 class="mb-4">Visi-Misi Masjid Agung An - Nur Pekanbaru</h2>

              <p><strong> Visi </strong><br>Membangun mental ummat yang berlandaskan konsep Islam Rohmatan lil ‘alamin, sebagai upaya menegakkan ajaran Islam ala ahlusunnah wal jamaah sebagaimana yang di bawa Rasulullah SAW.</p><p> Dan Menjadi masjid yang mandiri sebagai wadah pembinaan insan, pengembangan masyarakat, dan pembangunan peradaban yang Islami.</p>
              <br>
              <P><strong> Misi </strong><br>
               <ul type="circle">
                 <li>Menjadikan Masjid sebagai tempat untuk beribadah kepada Allah semata dan sebagai pusat kebudayaan Islam.</li>
                 <li>Mengisi abad kebangkitan Islam dengan aktivitas yang islami.</li>
                 <li>Membina jama’ah Masjid Agung An - Nur Pekanbaru menjadi pribadi muslim yang bertaqwa.</li>
                 <li>Menuju masyarakat islami yang sejahtera dan diridlai Allah subhanahu wa ta’ala</li>
               </ul></p>
            </div>
          </div>
        </div>
      </div>
    </section>

@include('user.footer')
@include('user.foot')
  </body>
</html>
