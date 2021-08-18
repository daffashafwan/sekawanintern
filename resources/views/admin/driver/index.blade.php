@extends('layouts.app')
@section('content')
    <!-- Default box -->
    <a type="button" class="btn ml-3 mr-3 mt-3 mb-3 btn-primary" data-toggle="modal" data-target="#modal-default">
        Tambah Driver
    </a>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Adminsitrasi Driver</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Nama Driver</th>
                <th>Alamat</th>
                <th>No. Telepon</th>
                <th>Email</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($driver as $d)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$d->nama}}</td>
                        <td>{{$d->alamat}}</td>
                        <td>{{$d->no_telepon}}</td>
                        <td>{{$d->email}}</td>
                        <td>
                            <a type="button" class="btn ml-1 mr-1 mt-1 mb-1 btn-secondary ModalEdit" data-toggle="modal" data-id="{{$d->id}}" data-target="#modal-default-edit">
                                 Edit
                            </a>
                            <a type="button" class="btn ml-1 mr-1 mt-1 mb-1 btn-danger ModalDelete" data-toggle="modal" data-ids="{{$d->id}}" data-target="#modal-default-hapus">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach

              </tbody>
              <tfoot>
              <tr>
                <th>No</th>
                <th>Nama Driver</th>
                <th>Alamat</th>
                <th>No. Telepon</th>
                <th>Email</th>
                <th>Aksi</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
@endsection
@section('before_script')
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Default Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('admin.driver.tambah')}}" method="POST">
                @csrf
                  <div class="form-group">
                    <label for="nama">Nama Driver</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Driver">
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat">
                  </div>
                  <div class="form-group">
                    <label for="no_telepon">No. Telepon</label>
                    <input type="text" class="form-control" id="no_telepon" name="no_telepon" placeholder="Masukkan No. Telepon">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email">
                  </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="modal-default-edit">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Default Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('admin.driver.edit')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama Driver</label>
                    <input type="hidden" name="id" id="id">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Driver">
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat">
                  </div>
                  <div class="form-group">
                    <label for="no_telepon">No. Telepon</label>
                    <input type="text" class="form-control" id="no_telepon" name="no_telepon" placeholder="Masukkan No. Telepon">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email">
                  </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="modal-default-hapus">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Default Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="formDelete" action="" method="POST">
                @method('delete')
                @csrf
                Apakah Anda yakin ingin menghapus driver ?
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
    </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
@endsection
@push('script')
      <script>
        $(".ModalEdit").click(function(e){
            let jpid = $(this).data("id");
            $("#id").val(jpid);

        });
        $(".ModalDelete").click(function(e){
            let ids = $(this).data("ids");
            $('#formDelete').attr('action', '/admin/driver/delete/' + ids);

        });
          $(function () {
                $('#example1').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                });
            });
      </script>
@endpush
