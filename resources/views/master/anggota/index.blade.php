@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Data Anggota</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Anggota</li>
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
                                        <th>Jabatan</th>
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
                                            <img class="rounded-circle" style="width: 100px; height: 100px;" src="foto-anggota/{{ $data -> foto }}" alt="">
                                        </td>
                                        <td>{{ $data -> nama }}</td>
                                        <td>{{ $data -> gaji -> jabatan }}</td>
                                        <td>{{ $data -> alamat }}</td>
                                        <td>{{ $data -> no_telpon }}</td>
                                        <td class="text-center">
                                            <a href="#" onclick="editConfirm({{$data}})" title="Edit" class="btn btn-primary btn-circle"><i class="fa fa-edit"></i></a>
                                            <a href="#" onclick="eyeConfirm({{$data}})" title="View" class="btn btn-warning btn-circle"><i class="fa fa-eye"></i></a>
                                            <a href="{{ route('anggota.destroy',$data) }}" onclick="event.preventDefault();destroy('{{ route('anggota.destroy',$data) }}');" class="btn btn-danger btn-circle" title="Hapus"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
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

<!-- sample modal content -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Tambah Anggota DKM</h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">×</button>
            </div>

            <div class="modal-body">
                <p>Wajib Diisi <code>*</code></p><br>
                <form action="{{ route('anggota.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <h6>Id Anggota <code>*</code></h6>
                    <input type="text" readonly class="form-control" value="{{$id_dkm}}" name="id_dkm" placeholder="Masukan Nama" required><br>
                    
                    <h6>Nama <code>*</code></h6>
                    <input type="text" class="form-control" value="" name="nama" placeholder="Masukan Nama" required><br>

                    <h6>Tanggal Lahir <code>*</code></h6>
                    <input type="date" class="form-control" value="" name="tgl_lahir" required><br>

                    <h6>Jenis Kelamin <code>*</code></h6>
                    <select class="form-control" name="jk">
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select><br>

                    <h6>Jabatan <code>*</code></h6>
                    <select class="form-control" name="posisi">
                        @foreach($gaji as $gj)
                            <option value='{{$gj -> id}}'>{{$gj -> jabatan}}</option>
                        @endforeach
                    </select><br>

                    <h6>Alamat <code>*</code></h6>
                    <textarea rows="3" class="form-control" name="alamat" placeholder="Masukan Alamat" required></textarea><br>

                    <h6>No HP <code>*</code></h6>
                    <input type="number" class="form-control" value="" name="no_telpon" placeholder="Masukan No Telpon" required><br>

                    <h6>Foto <code>*</code></h6>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="foto" class="custom-file-input" id="inputGroupFile01" require>
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
</div><!-- /.modal -->


<!-- sample edit modal content -->
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit Anggota DKM</h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p>Wajib Diisi <code>*</code></p><br>
                <form id="editForm" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    {{ csrf_field() }}
                    <h6>Id Anggota <code>*</code></h6>
                    <input type="text" readonly class="form-control" id='id_anggota' name="id_anggota" placeholder="Masukan Nama" required><br>

                    <h6>Nama <code>*</code></h6>
                    <input type="text" class="form-control" id='nama' name="nama" placeholder="Masukan Nama" required><br>

                    <h6>Tanggal Lahir <code>*</code></h6>
                    <input type="date" class="form-control" id='tgl_lahir' name="tgl_lahir" required><br>
                    
                    <h6>Jenis Kelamin <code>*</code></h6>
                    <select class="form-control" id="jk" name="jk">
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select><br>

                    <h6>Jabatan <code>*</code></h6>
                    <select class="form-control" id="jabatan" name="jabatan">
                        @foreach($gaji as $gj)
                            <option value='{{$gj -> id}}'>{{$gj -> jabatan}}</option>
                        @endforeach
                    </select><br>

                    <h6>Alamat <code>*</code></h6>
                    <textarea rows="3" class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat" required></textarea><br>

                    <h6>No HP <code>*</code></h6>
                    <input type="number" class="form-control" id="no_telpon" name="no_telpon" placeholder="Masukan No Telpon" required><br>

                    <h6>Foto</h6>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="foto" class="custom-file-input" id="inputGroupFile01" require>
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>

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


<!-- sample View modal content -->
<div id="ModalView" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">View Anggota DKM</h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <center>
                    <img id="foto2" class="rounded-circle" style="width: 100px; height: 100px;" alt="">
                </center>
                <form id="editForm" method="POST" enctype="multipart/form-data">
                    <h6>Id Anggota</h6>
                    <input type="text" disabled class="form-control" id='id_anggota2' name="id_anggota2" placeholder="Masukan Nama" required><br>

                    <h6>Nama</h6>
                    <input type="text" class="form-control" id='nama2' name="nama2" placeholder="Masukan Nama" disabled><br>

                    <h6>Tanggal Lahir</h6>
                    <input type="date" class="form-control" id='tgl_lahir2' name="tgl_lahir2" disabled><br>
                    
                    <h6>Jenis Kelamin</h6>
                    <select disabled class="form-control" id="jk2" name="jk2">
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select><br>

                    <h6>Jabatan</h6>
                    <select disabled class="form-control" id="jabatan2" name="jabatan2">
                        @foreach($gaji as $gj)
                            <option value='{{$gj -> id}}'>{{$gj -> jabatan}}</option>
                        @endforeach
                    </select><br>

                    <h6>Alamat</h6>
                    <textarea rows="3" class="form-control" id="alamat2" name="alamat2" placeholder="Masukan Alamat" disabled></textarea><br>

                    <h6>No HP</h6>
                    <input type="number" class="form-control" id="no_telpon2" name="no_telpon2" placeholder="Masukan No Telpon" disabled><br>

                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger"
                        data-dismiss="modal">Close</button>
                </form>
            </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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
            $('#id_anggota').attr('value',data.id_dkm);
            $('#nama').attr('value',data.nama);
            $('#tgl_lahir').attr('value',data.tgl_lahir);
            $('#jenis_kelamin').attr('value',data.jenis_kelamin);
            $('#jabatan').attr('value',data.jabatan);
            $('#alamat').html(data.alamat);
            $('#no_telpon').attr('value',data.no_telpon);
            $('#editForm').attr('action',"{{url('anggota')}}/"+data.id);
            $('#ModalEdit').modal();
        
        }
        function eyeConfirm(data) {
            $('#id_anggota2').attr('value',data.id_dkm);
            $('#nama2').attr('value',data.nama);
            $('#tgl_lahir2').attr('value',data.tgl_lahir);
            $('#jenis_kelamin2').attr('value',data.jenis_kelamin);
            $('#jabatan2').attr('value',data.jabatan);
            $('#alamat2').html(data.alamat);
            $('#foto2').attr('src',"foto-anggota/"+data.foto);
            $('#no_telpon2').attr('value',data.no_telpon);
            $('#ModalView').modal();
        
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