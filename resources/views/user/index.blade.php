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
          <div class="col-lg-8 col-md-6 ftco-animate d-flex align-items-end">
          	<div class="text text-center">
	            <h1 class="mb-4"> <span style="font-family: ui-monospace">Ayo Langkahkan Kaki<br>Pergi Ke Masjid</span></h1>
	            <p style="font-size: 18px;color:#fff;">Jangan tuntut tuhanmu karena tertundanya keinginanmu, tapi tuntut dirimu karena menunda adabmu kepada Allah</p>
	            <form action="#" class="search-location mt-md-5">
		        		<div class="row justify-content-center">
		        			<div class="col-lg-10 align-items-end">
		        				<div class="form-group">
			              </div>
		        			</div>
		        		</div>
		        	</form>
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
      	<div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          	<span class="subheading">Pelayanan Kami</span>
            <h2 class="mb-2">Anda tidak akan miskin dengan berinfaq</h2>
          </div>
        </div>
        <div class="row d-flex">
          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
            	<div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-wallet"></span></div>
              <div class="media-body py-md-4">
                <h3>Membuat Donasi</h3>
                <p>Dukung ruang doa dan pusat komunitas yang inovatif ini untuk beragam penduduk Muslim Masjid Agung An - Nur Pekanbaru. Bantu ciptakan ruang yang didedikasikan untuk kedamaian dan keindahan!</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
            	<div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-file"></span></div>
              <div class="media-body py-md-4">
                <h3>Sejarah Mesjid</h3>
                <p>Masjid Agung An Nur merupakan sebuah masjid yang terletak di Pekanbaru, Indonesia. Masjid ini dibangun pada tahun 1963 dan selesai pada tahun 1968.</p>
                <p>Masjid yang di ibukota Provinsi Riau, Pekanbaru tersebut saat ini merupakan salah satu yang termegah di Indonesia. Dilihat dari sisi bangunannya, masjid banyak mendapat pengaruh dari gaya arsitektur Melayu, Turki, Arab dan India.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
            	<div class="icon d-flex justify-content-center align-items-center"><span class="flaticon-locked"></span></div>
              <div class="media-body py-md-4">
                <h3>Lokasi Masjid</h3>
                <p> Jl. Hangtuah, Sumahilang, Pekanbaru Kota, Kota Pekanbaru, Riau 28156</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="ftco-section ftco-no-pb">
      <div class="container">
      	<div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          	<span class="subheading">Foto Masjid</span>
            <h2 class="mb-2">Galeri Masjid Agung An-Nur Pekanbaru</h2>
          </div>
        </div>
        <div class="row d-flex">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="{{asset('carousel/1.jpeg')}}">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="{{asset('carousel/2.jpeg')}}">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="{{asset('carousel/3.jpeg')}}">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="{{asset('carousel/4.jpeg')}}">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="{{asset('carousel/5.jpeg')}}">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="{{asset('carousel/6.jpeg')}}">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="{{asset('carousel/7.jpeg')}}">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="{{asset('carousel/8.jpeg')}}">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="{{asset('carousel/9.jpeg')}}">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

     <section class="ftco-section ftco-agent">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
            <span class="subheading">Jadwal Kami</span>
            <h2 class="mb-2">Jadwal Acara Masjid Agung An - Nur Pekanbaru</h2>
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
    <section class="ftco-section goto-here">
    	<div class="container">
    		<div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
            <h2 class="mb-2">Jadwal Solat Di Masjid Agung An - Nur</h2>
          </div>
        </div>
         <div class="row">
        	<div class="col-md-4">
        		<div class="property-wrap">
        			<a href="#" class="img" style="background-image: url(images/bck3.png)"></a>
        		</div>
          </div>
          <div class="col-md-8">
        		<div class="property-wrap ftco-animate">
        			<a href="#" class="img" style="background: #ecf0f1">
                <br>
                  <h5 class="jdw">JADWAL SOLAT </h5>
                  <div class="garis"></div>
                  <table align="center" cellpadding="10">
                      <tr>
                          <th>Subuh</th>
                          <th>Terbit</th>
                          <th>Zuhur</th>
                          <th>Asar</th>
                          <th>Magrib</th>
                          <th>Isa</th>
                      </tr>
                      <tr style="color: black">
                          <td>04:54</td>
                          <td>05.45</td>
                          <td>12:22</td>
                          <td>15:48</td>
                          <td>18:27</td>
                          <td>19:41</td>
                      </tr>
                  </table>

              </a>
        		</div>
        	</div>
        </div>
    	</div>
    </section>

    <section class="ftco-section ftco-degree-bg services-section img mx-md-5" style="background-image: url(images/bck4.png);">
    	<div class="overlay"></div>
    	<div class="container">
    		<div class="row justify-content-start mb-5">
          <div class="col-md-6 text-center heading-section heading-section-white ftco-animate">
          	<span class="subheading">ALIRAN DANA</span>
          </div>
        </div>
    		<div class="row">
    			<div class="col-md-6">
    				<div class="row">
		    			<div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
		            <div class="media block-6 services services-2">
		              <div class="media-body py-md-4 text-center">
		              	<div class="icon mb-3 d-flex align-items-center justify-content-center"><span>01</span></div>
		                <h3>Pemasukan</h3>
		                <strong><p>Rp. {{number_format($pemasukan->debit,0,',','.')}},-</p></strong>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
		            <div class="media block-6 services services-2">
		              <div class="media-body py-md-4 text-center">
		              	<div class="icon mb-3 d-flex align-items-center justify-content-center"><span>02</span></div>
		                <h3>Pengeluaran</h3>
                            <strong><p>Rp. {{number_format($pengeluaran->kredit,0,',','.')}},-</p></strong>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
		            <div class="media block-6 services services-2">
		              <div class="media-body py-md-4 text-center">
		              	<div class="icon mb-3 d-flex align-items-center justify-content-center"><span>03</span></div>
		                <h3>Total Saldo</h3>
                            @php
                                $saldo = $pemasukan->debit - $pengeluaran->kredit;
                            @endphp
                            <strong><p>Rp. {{number_format($saldo,0,',','.')}},-</p></strong>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
		            <div class="media block-6 services services-2">
		              <div class="media-body py-md-4 text-center">
		              	<div class="icon mb-3 d-flex align-items-center justify-content-center"><span>04</span></div>
		                <h3>Lainnya</h3>
		                <p>......</p>
		              </div>
		            </div>
		          </div>
		        </div>
		      </div>
    		</div>
    	</div>
    </section>

@include('user.footer')
@include('user.foot')
  </body>
</html>
