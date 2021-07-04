@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Keuangan</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Laporan Keuangan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- basic table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="pull-right">
                            <form action="{{ route('laporan.keuangan.store') }}" method="POST">
                                <div class="row">
                                    {{ csrf_field() }}
                                    <div class="col-md-3">
                                        <label >Tanggal Awal</label>
                                        <input type="date" value="{{$awal}}" class="form-control" name="awal" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label >Tanggal Akhir</label>
                                        <input type="date" value="{{$akhir}}" class="form-control" name="akhir" required>
                                    </div>
                                </div><br>
                                <button type="submit" class="btn waves-effect waves-light btn-rounded btn-outline-success"><i class="fa fa-filter"></i> Filter</button>
                                <button type="button" onclick="javascript:window.print()" class="btn waves-effect waves-light btn-rounded btn-outline-info"><i class="fa fa-print"></i> Print</button>
                            </form>
                            <br><br>
                        </div>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Debit</th>
                                        <th>Kredit</th>
                                        <th>Saldo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php 
                                        $no = 1; 
                                        $saldo = 0; 
                                    @endphp
                                    @foreach($datas as $data)
                                    @php
                                        $saldo = $saldo + $data -> debit - $data -> kredit; 
                                    @endphp
                                    <tr>
                                        <td class="serial">{{ $no++ }}</td>
                                        <td>{{ $data -> tanggal }}</td>
                                        <td>Rp. {{number_format($data->debit,0,',','.')}},-</td>
                                        <td>Rp. {{number_format($data->kredit,0,',','.')}},-</td>
                                        <td>Rp. {{number_format($saldo,0,',','.')}},-</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Debit</th>
                                        <th>Kredit</th>
                                        <th>Saldo</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer text-center text-muted">
        Copyright @Della Octa Irmulvani 
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
@endsection

@push('print')
<div class="page-title">
  <div class="title_left">
    <h3>Laporan Keuangan</h3>
  </div>
  <div class="title_right">
    <div class="col-md-12 col-sm-5 col-xs-12 form-group pull-right top_search">
		<div style='float:right;text-align:right'>
			<img width="150" src="{{asset('logo.png')}}" />
			<br><br>
			<h2 style="font-size:14pt">BeautieSS Skincare <br>
				<small>
					Jalan Talaga Bodas no.70, Lingkar Selatan, Lengkong<br>
					Bandung<br>
					Jawa Barat, Indonesia <br>
					Phone:(022) 873-287-77 <br>
				</small>
			</h2>
		</div>
    </div>
  </div>
</div>

<div class="clearfix"></div>

	<div class="row" style="display: block;">
		<div class="col-md-12  ">
			<div class="x_content">
				<table class="table table-striped">
					<thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Debit</th>
                            <th>Kredit</th>
                            <th>Saldo</th>
                        </tr>
					</thead>
                    <tbody>
                        @php 
                            $no = 1; 
                            $saldo = 0; 
                        @endphp
                        @foreach($datas as $data)
                        @php
                            $saldo = $saldo + $data -> debit - $data -> kredit; 
                        @endphp
                        <tr>
                            <td class="serial">{{ $no++ }}</td>
                            <td>{{ $data -> tanggal }}</td>
                            <td>Rp. {{number_format($data ->debit,0,',','.')}},-</td>
                            <td>Rp. {{number_format($data ->kredit,0,',','.')}},-</td>
                            <td>Rp. {{number_format($saldo,0,',','.')}},-</td>
                        </tr>
                        @endforeach
                    </tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endpush
@push('style-asset')
    <style>
      #printable { display: none; }

      @media print
      {
          #non-printable { display: none; }
          #printable { display: block; }
      }
    </style>
    <link href="{{asset('assets/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endpush

@push('script-asset')
    <script src="{{asset('assets/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
@endpush