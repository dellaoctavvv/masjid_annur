@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Pemasukan</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Pemasukan</li>
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
                            <button type="button" data-toggle="modal" data-target="#myModal" class="btn waves-effect waves-light btn-rounded btn-outline-success">Tambah</button>
                            <br>
                            <br>
                        </div>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Kategori Sumbangan</th>
                                        <th>Penyumbang</th>
                                        <th>Nominal</th>
                                        <th>Keterangan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($datas as $data)
                                    <tr>
                                        <td class="serial">{{ $no++ }}</td>
                                        <td>{{ $data -> tanggal }}</td>
                                        <td>{{ $data -> katsum -> nama_katsum }}</td>
                                        <td>{{ $data -> penyumbang }}</td>
                                        <td>Rp. {{number_format($data -> debit,0,',','.')}},-</td>
                                        <td>{{ $data -> keterangan }}</td>
                                        <td class="text-center">
                                            <a href="#" onclick="editConfirm({{$data}})" title="Edit" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('pemasukan.destroy',$data) }}" onclick="event.preventDefault();destroy('{{ route('pemasukan.destroy',$data) }}');" class="btn btn-danger btn-circle" title="Hapus"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Kategori Sumbangan</th>
                                        <th>Penyumbang</th>
                                        <th>Nominal</th>
                                        <th>Keterangan</th>
                                        <th>Action</th>
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

<!-- sample modal content -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Tambah Pemasukan</h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p>Wajib Diisi <code>*</code></p><br>
                <form action="{{ route('pemasukan.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <h6>Tanggal <code>*</code></h6>
                    <input type="date" class="form-control" name="tanggal" required><br>
                    
                    <h6>Kategori Sumbangan <code>*</code></h6>
                    <select class="form-control" name="id_katsum" id="id_katsum" required>
                        @foreach($kategori as $kt)
                            <option value="{{$kt->id}}">{{$kt->id_katsum}} - {{$kt->nama_katsum}}</option>
                        @endforeach                    
                    </select><br>

                    <h6>Nominal <code>*</code></h6>
                    <input type="number" class="form-control" name="debit" placeholder="Masukan Nominal" required><br>
                    
                    <h6>Penyumbang </h6>
                    <input type="text" class="form-control" name="penyumbang" placeholder="Masukan Nominal" ><br>
                    

                    <h6>Keterangan</h6>
                    <textarea rows="3" class="form-control" name="keterangan" placeholder="Masukan Keterangan"></textarea><br>
                    
            <div class="modal-footer">
                <button type="button" class="btn btn-danger"
                    data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- sample edit modal content -->
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Ubah Pengeluran</h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p>Wajib Diisi <code>*</code></p><br>
                <form id="editForm" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    {{ csrf_field() }}
                    
                    <h6>Tanggal <code>*</code></h6>
                    <input type="date" class="form-control" name="tanggal" id="tanggal" required><br>
                    
                    <h6>Kategori <code>*</code></h6>
                    <select class="form-control" name="id_katsum" id="id_katsum" required>
                        @foreach($kategori as $kt)
                            <option value="{{$kt->id}}">{{$kt->id_katsum}} - {{$kt->nama_katsum}}</option>
                        @endforeach                    
                    </select><br>

                    <h6>Nominal <code>*</code></h6>
                    <input type="number" class="form-control" name="debit" id="debit" placeholder="Masukan Nominal" required><br>
                    
                    <h6>Penyumbang </h6>
                    <input type="text" class="form-control" name="penyumbang" id="penyumbang" placeholder="Masukan Nominal" ><br>
                    
                    <h6>Keterangan</h6>
                    <textarea rows="3" class="form-control" name="keterangan" id="keterangan" placeholder="Masukan Keterangan"></textarea><br>
                    
            <div class="modal-footer">
                <button type="button" class="btn btn-danger"
                    data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- hapus -->
<form id="destroy-form" method="POST">
    @method('DELETE')
    @csrf
</form>
@endsection

@push('style-asset')
    <link href="{{asset('assets/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endpush

@push('script-asset')

    <script>
        function editConfirm(data) {
            $('#tanggal').attr('value',data.tanggal);
            $('#keterangan').html(data.keterangan);
            $('#debit').attr('value',data.debit);
            $('#id_katsum').attr('value',data.id_katsum);
            $('#peyumbang').attr('value',data.peyumbang);
            $('#editForm').attr('action',"{{url('pemasukan')}}/"+data.id);
            $('#ModalEdit').modal();
        
        }

        function destroy(action){
            swal({
                title: 'Apakah anda yakin?',
                text: 'Setelah dihapus, Anda tidak akan dapat mengembalikan data ini!',
                icon: 'warning',
                buttons: ["Cancel", "Yes!"],
            }).then(function(value) {
                if (value) {
                document.getElementById('destroy-form').setAttribute('action', action);
                document.getElementById('destroy-form').submit();
                }else {
                swal("Data kamu aman!");
            }
            });
        }
    </script>
    <script src="{{asset('assets/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
@endpush