@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Jabatan Anggota DKM</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Gaji</li>
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
                                        <th>Nama Jabatan</th>
                                        <th>Nominal</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($datas as $data)
                                    <tr>
                                        <td class="serial">{{ $no++ }}</td>
                                        <td>{{ $data -> jabatan }}</td>
                                        <td>{{ $data -> nominal }}</td>
                                        <td class="text-center">
                                            <a href="#" onclick="editConfirm({{$data}})" title="Edit" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('gaji.destroy',$data) }}" onclick="event.preventDefault();destroy('{{ route('gaji.destroy',$data) }}');" class="btn btn-danger btn-circle" title="Hapus"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Jabatan</th>
                                        <th>Nominal</th>
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
                <h4 class="modal-title" id="myModalLabel">Tambah Jabatan Anggota DKM</h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p>Wajib Diisi <code>*</code></p><br>
                <form action="{{ route('gaji.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <h6>Id Gaji <code>*</code></h6>
                    <input type="text" readonly class="form-control" value="{{$id_gaji}}" name="id_gaji" placeholder="Masukan Nama" required><br>

                    <h6>Nama Jabatan <code>*</code></h6>
                    <input type="text" class="form-control" id='' name="jabatan" placeholder="Masukan Nama" required><br>

                    <h6>Nominal <code>*</code></h6>
                    <input type="number" class="form-control" id='' name="nominal" required><br>
                    
                    
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
                <h4 class="modal-title" id="myModalLabel">Ubah Jabatan Anggota DKM</h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p>Wajib Diisi <code>*</code></p><br>
                <form id="editForm" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    {{ csrf_field() }}
                    <h6>Id Gaji <code>*</code></h6>
                    <input type="text" readonly class="form-control" id='id_gaji' name="id_gaji" placeholder="Masukan Nama" required><br>

                    <h6>Nama Jabatan <code>*</code></h6>
                    <input type="text" class="form-control" id='jabatan' name="jabatan" placeholder="Masukan Nama" required><br>

                    <h6>Nominal <code>*</code></h6>
                    <input type="number" class="form-control" id='nominal' name="nominal" required><br>
                    
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
            $('#id_gaji').attr('value',data.id_gaji);
            $('#jabatan').attr('value',data.jabatan);
            $('#nominal').attr('value',data.nominal);
            $('#editForm').attr('action',"{{url('gaji')}}/"+data.id);
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