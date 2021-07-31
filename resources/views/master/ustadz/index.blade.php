@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Data Ustadz</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Ustadz</li>
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
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Nomor Telephone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach($datas as $data)
                                    <tr>
                                        <td class="serial">{{ $no++ }}</td>
                                        <td>
                                            <img class="rounded-circle" style="width: 100px; height: 100px;" src="foto-ustadz/{{ $data -> foto }}" alt="">
                                        </td>
                                        <td>{{ $data -> nama }}</td>
                                        <td>{{ $data -> alamat }}</td>
                                        <td>{{ $data -> no_telpon }}</td>
                                        <td class="text-center">
                                            <button type="button" onclick="editForm({{$data}})" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></button>
                                            <button type="button" onclick="detailForm({{$data}})" class="btn btn-warning btn-circle"><i class="fa fa-eye"></i></button>
                                            <!-- <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-trash"></i></button> -->
                                            <a href="{{ route('ustadz.destroy',$data) }}" onclick="event.preventDefault();destroy('{{ route('ustadz.destroy',$data) }}');" class="btn btn-danger btn-circle" title="Hapus"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Nomor Telephone</th>
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

<!-- Modal Add -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Tambah Ustadz</h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p>Wajib Diisi <code>*</code></p><br>
                <form action="{{ route('ustadz.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <h6>Id Ustadz <code>*</code></h6>
                    <input type="text" readonly class="form-control" value="{{$id_ustadz}}" name="id_ustadz" placeholder="Masukan Nama" required><br>
                    
                    <h6>Nama <code>*</code></h6>
                    <input type="text" class="form-control" value="" name="nama" placeholder="Masukan Nama" required><br>

                    <h6>Tanggal Lahir <code>*</code></h6>
                    <input type="date" class="form-control" value="" name="tgl" required><br>

                    <h6>Jenis Kelamin <code>*</code></h6>
                    <select class="form-control" name="jk" name="jk">
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select><br>

                    <h6>Alamat <code>*</code></h6>
                    <textarea rows="3" class="form-control" name="alamat" placeholder="Masukan Alamat" required></textarea><br>

                    <h6>No HP <code>*</code></h6>
                    <input type="number" class="form-control" value="" name="no_hp" placeholder="Masukan No Telpon" required><br>

                    <h6>Foto <code>*</code></h6>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="foto" class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger"
                            data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal add -->


<!-- Modal update -->
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit Ustadz</h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p>Wajib Diisi <code>*</code></p><br>
                <form id="editForm" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    {{ csrf_field() }}
                    <h6>Id Ustadz <code>*</code></h6>
                    <input readonly type="text" class="form-control" name="id_ustadz" id="id_ustadz" required><br>
                    
                    <h6>Nama <code>*</code></h6>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama" required><br>

                    <h6>Tanggal Lahir <code>*</code></h6>
                    <input type="date" class="form-control" name="tgl" id="tgl" required><br>

                    <h6>Jenis Kelamin <code>*</code></h6>
                    <select class="form-control" name="jk" id="jk">
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select><br>

                    <h6>Alamat <code>*</code></h6>
                    <textarea rows="3" class="form-control" name="alamat" id="alamat" placeholder="Masukan Alamat" required></textarea><br>

                    <h6>No HP <code>*</code></h6>
                    <input type="number" class="form-control" name="no_hp" id="no_hp" placeholder="Masukan No Telpon" required><br>

                    <h6>Foto</h6>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="foto" class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger"
                            data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal update -->


<!-- Modal detail -->
<div id="ModalDetail" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Detail Ustadz</h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form id="detailForm" method="POST" enctype="multipart/form-data">
                    <h6>Id Ustadz</h6>
                    <input readonly type="text" class="form-control" name="id_ustadz1" id="id_ustadz1" required><br>
                    
                    <h6>Nama</h6>
                    <input type="text" class="form-control" readonly name="nama" id="nama1" placeholder="Masukan Nama" required><br>

                    <h6>Tanggal Lahir</h6>
                    <input type="date" class="form-control" readonly name="tgl" id="tgl1" required><br>

                    <h6>Jenis Kelamin</h6>
                    <select class="form-control" readonly name="jk" id="jk1">
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select><br>

                    <h6>Alamat</h6>
                    <textarea rows="3" class="form-control" readonly name="alamat" id="alamat1" placeholder="Masukan Alamat" required></textarea><br>

                    <h6>No HP</h6>
                    <input type="number" class="form-control" readonly name="no_hp" id="no_hp1" placeholder="Masukan No Telpon" required><br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger"
                            data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal update -->

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
        function editForm(data) {
            console.log(data);
            $('#id_ustadz').attr('value',data.id_ustadz);
            $('#nama').attr('value',data.nama);
            $('#tgl').attr('value',data.tgl_lahir);
            $('#alamat').html(data.alamat);
            $('#no_hp').attr('value',data.no_telpon);
            $('#jk').val(data.jenis_k);
            $('#editForm').attr('action',"{{url('ustadz')}}/"+data.id);
            $('#ModalEdit').modal();
        }
        function detailForm(data) {
            console.log(data.id_ustadz);
            $('#id_ustadz1').attr('value',data.id_ustadz);
            $('#nama1').attr('value',data.nama);
            $('#tgl1').attr('value',data.tgl_lahir);
            $('#alamat1').html(data.alamat);
            $('#no_hp1').attr('value',data.no_telpon);
            $('#jk1').val(data.jenis_k);
            $('#detailForm').attr('action',"{{url('ustadz')}}/"+data.id);
            $('#ModalDetail').modal();
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