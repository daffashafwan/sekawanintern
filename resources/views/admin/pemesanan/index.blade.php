@extends('layouts.app')
@section('content')
    <!-- Default box -->
    <a type="button" class="btn ml-3 mr-3 mt-3 mb-3 btn-primary" data-toggle="modal" data-target="#modal-default">
        Tambah pemesanan
    </a>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Adminsitrasi Pemesanan</h3>
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
                <th>Waktu pemesanan</th>
                <th>Kendaraaan</th>
                <th>Pemakaian Bensin</th>
                <th>Driver</th>
                <th>Penyetuju</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($pemesanan as $p)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $p->waktu_pemesanan)->format('d M Y')}}</td>
                        <td>{{$p->Kendaraan->nama}}</td>
                        <td>{{$p->Kendaraan->bensin}}</td>
                        <td>{{$p->Driver->nama}}</td>
                        <td>{{$p->Penyetuju->nama}}</td>
                        <td>{{$p->status == 0 ? 'Belum Disetujui' : ($p->status == 1 ? 'Disetujui' : 'Tidak Disetujui')}}</td>
                        <td>
                            <a style="visibility: <?php echo($p->status == 0 ? 'visible' : 'hidden')?>" type="button" data-toggle="modal" class="btn ml-1 mr-1 mt-1 mb-1 btn-secondary ModalEdit" data-id="{{$p->id}}" data-target="#modal-default-edit">
                                 Edit
                            </a>
                            <a style="visibility: <?php echo($p->status == 0 ? 'visible' : 'hidden')?>" type="button" data-toggle="modal" class="btn ml-1 mr-1 mt-1 mb-1 btn-danger ModalDelete" data-ids="{{$p->id}}" data-target="#modal-default-hapus">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach

              </tbody>
              <tfoot>
              <tr>
                <th>No</th>
                <th>Waktu pemesanan</th>
                <th>Kendaraaan</th>
                <th>Pemakaian Bensin</th>
                <th>Driver</th>
                <th>Penyetuju</th>
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
            <form action="{{route('admin.pemesanan.tambah')}}" method="POST">
                @csrf
                  <div class="form-group">
                    <label for="waktu_pemesanan">Tanggal pemesanan</label>
                    <input type="date" class="form-control" id="waktu_pemesanan" name="waktu_pemesanan">
                  </div>
                  <div class="form-group">
                    <label for="kendaraan">Kendaraan</label>
                    <select name="kendaraan" class="custom-select form-control" id="kendaraan">
                        @foreach ($kendaraan as $k)
                            <option value="{{$k->id}}">{{$k->nama}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="driver">Penyetuju</label>
                    <select name="penyetuju" class="custom-select form-control" id="penyetuju">
                        @foreach ($penyetuju as $p)
                            <option value="{{$p->id}}">{{$p->nama}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="driver">Driver</label>
                    <select name="driver" class="custom-select form-control" id="driver">
                        @foreach ($driver as $d)
                            <option value="{{$d->id}}">{{$d->nama}}</option>
                        @endforeach
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
            <form action="{{route('admin.pemesanan.edit')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="waktu_pemesanan">Waktu pemesanan</label>
                    <input type="hidden" name="id" id="id">
                    <input type="date" class="form-control" id="waktu_pemesanan" name="waktu_pemesanan">
                  </div>
                  <div class="form-group">
                    <label for="kendaraan">Kendaraan</label>
                    <select name="kendaraan" class="custom-select form-control" id="kendaraan">
                        @foreach ($kendaraan as $k)
                            <option value="{{$k->id}}">{{$k->nama}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="driver">Penyetuju</label>
                    <select name="penyetuju" class="custom-select form-control" id="penyetuju">
                        @foreach ($penyetuju as $p)
                            <option value="{{$p->id}}">{{$p->nama}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="driver">Driver</label>
                    <select name="driver" class="custom-select form-control" id="driver">
                        @foreach ($driver as $d)
                            <option value="{{$d->id}}">{{$d->nama}}</option>
                        @endforeach
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
                Apakah Anda yakin ingin menghapus pemesanan ?
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
            $('#formDelete').attr('action', '/admin/pemesanan/delete/' + ids);

        });
          $(function () {
            $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                // $('#example1').DataTable({
                // "paging": true,
                // "lengthChange": false,
                // "searching": true,
                // "ordering": true,
                // "info": true,
                // "autoWidth": false,
                // "responsive": true,
                // });
            });
      </script>
@endpush
