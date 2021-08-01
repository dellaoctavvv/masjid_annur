<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
<div class="container">
  <a class="navbar-brand" href="index.php">Masjid Agung An - Nur</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="oi oi-menu"></span> Menu
  </button>
  <div class="collapse navbar-collapse" id="ftco-nav">
    <ul class="navbar-nav ml-auto">
    @for($i=0; $i < 5; $i++)
      <li class="nav-item {{$datas->status[$i]}}"><a href="{{$datas->link[$i]}}" class="nav-link">{{$datas->title[$i]}}</a></li>
    @endfor
    </ul>
  </div>
</div>
</nav>
