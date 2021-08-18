@extends('layouts.app')
@section('content')
    <!-- Default box -->
    <a type="button" class="btn ml-3 mr-3 mt-3 mb-3 btn-primary" data-toggle="modal" data-target="#modal-default">
        Tambah Kendaraan
    </a>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Pemesanan Kendaraan</h3>
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
                <th>Nama Kendaraan</th>
                <th>Konsumsi BBM</th>
                <th>Jadwal Servis</th>
                <th>Servis Terakhir</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($kendaraan as $k)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$k->nama}}</td>
                        <td>{{$k->bensin}}</td>
                        <td>{{$k->jadwal_servis}} hari sekali</td>
                        <td>{{$k->servis_terakhir}}</td>
                        <td>{{$k->status == 0 ? 'Tidak Dipinjam' : ($k->status == 1 ? 'Dipinjam' : 'Diservis')}}</td>
                        <td>
                            <a type="button" class="btn ml-1 mr-1 mt-1 mb-1 btn-secondary ModalEdit" data-toggle="modal" data-id="{{$k->id}}" data-target="#modal-default-edit">
                                 Edit
                            </a>
                            <a type="button" class="btn ml-1 mr-1 mt-1 mb-1 btn-danger ModalDelete" data-toggle="modal" data-ids="{{$k->id}}" data-target="#modal-default-hapus">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach

              </tbody>
              <tfoot>
              <tr>
                <th>No</th>
                <th>Nama Kendaraan</th>
                <th>Konsumsi BBM</th>
                <th>Jadwal Servis</th>
                <th>Servis Terakhir</th>
                <th>Status</th>
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
            <form action="{{route('admin.kendaraan.tambah')}}" method="POST">
                @csrf
                  <div class="form-group">
                    <label for="nama">Nama Kendaraan</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
                  </div>
                  <div class="form-group">
                    <label for="bensin">Konsumsi BBM</label>
                    <input type="text" class="form-control" id="bensin" name="bensin" placeholder="Masukkan Konsumsi BBM">
                  </div>
                  <div class="form-group">
                    <label for="jadwal_servis">Jadwal Servis (Hari Sekali)</label>
                    <input type="text" class="form-control" id="jadwal_servis" name="jadwal_servis" placeholder="Masukkan Jadwal Servis">
                  </div>
                  <div class="form-group">
                    <label for="servis_terakhir">Servis Terakhir</label>
                    <input type="date" class="form-control" id="servis_terakhir" name="servis_terakhir" placeholder="Masukkan Servis Terakhir">
                  </div>
                  <div class="form-group">
                    <label for="status">Status Kendaraan</label>
                    <select name="status" class="custom-select form-control" id="status">
                        <option value="0">Tidak Dipinjam</option>
                        <option value="1">Dipinjam</option>
                        <option value="3">Diservis</option>
                    </select>
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
            <form action="{{route('admin.kendaraan.edit')}}" method="POST">
                @csrf
                  <div class="form-group">
                    <label for="nama">Nama Kendaraan</label>
                    <input type="hidden" name="id" id="id">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
                  </div>
                  <div class="form-group">
                    <label for="bensin">Konsumsi BBM</label>
                    <input type="text" class="form-control" id="bensin" name="bensin" placeholder="Masukkan Konsumsi BBM">
                  </div>
                  <div class="form-group">
                    <label for="jadwal_servis">Jadwal Servis (Hari Sekali)</label>
                    <input type="text" class="form-control" id="jadwal_servis" name="jadwal_servis" placeholder="Masukkan Jadwal Servis">
                  </div>
                  <div class="form-group">
                    <label for="servis_terakhir">Servis Terakhir</label>
                    <input type="date" class="form-control" id="servis_terakhir" name="servis_terakhir" placeholder="Masukkan Servis Terakhir">
                  </div>
                  <div class="form-group">
                    <label for="status">Status Kendaraan</label>
                    <select name="status" class="custom-select form-control" id="status">
                        <option value="0">Tidak Dipinjam</option>
                        <option value="1">Dipinjam</option>
                        <option value="3">Diservis</option>
                    </select>
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
                Apakah Anda yakin ingin menghapus kendaraan ?
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
            $('#formDelete').attr('action', '/admin/kendaraan/delete/' + ids);

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
