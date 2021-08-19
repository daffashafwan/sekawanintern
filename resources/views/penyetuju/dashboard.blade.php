@extends('layouts.app-user')
@section('content')
    <!-- Default box -->
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
                <th>Waktu pemesanan</th>
                <th>Kendaraaan</th>
                <th>Pemakaian Bensin</th>
                <th>Driver</th>
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
                        <td>{{$p->status == 0 ? 'Belum Disetujui' : ($p->status == 1 ? 'Disetujui' : 'Tidak Disetujui')}}</td>
                        <td>
                            <a type="button" class="btn ml-1 mr-1 mt-1 mb-1 btn-danger ModalEdit" data-toggle="modal" data-ids="{{$p->id}}" data-status="2" data-target="#modal-default-tolak">
                                Tolak
                            </a>
                            <a type="button" class="btn ml-1 mr-1 mt-1 mb-1 btn-success ModalEdit" data-toggle="modal" data-ids="{{$p->id}}" data-status="1" data-target="#modal-default-setuju">
                                Setuju
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
  <div class="modal fade" id="modal-default-tolak">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Konfirmasi</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('penyetuju.dashboard.penyetujuan')}}" method="POST">
                @csrf
                Apakah Anda yakin untuk menolak pemesanan ini ?
                  <div class="form-group">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="status" id="status">
                  </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-danger">Tolak</button>
        </div>
    </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <div class="modal fade" id="modal-default-setuju">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Default Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('penyetuju.dashboard.penyetujuan')}}" method="POST">
                @csrf
                Apakah Anda yakin untuk menyetujui pemesanan ini ?
                  <div class="form-group">
                    <input type="hidden" name="id" id="ids">
                    <input type="hidden" name="status" id="statuss">
                  </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-success">Setuju</button>
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
            let jpid = $(this).data("ids");
            let status = $(this).data("status");
            $("#id").val(jpid);
            $("#ids").val(jpid);
            $("#status").val(status);
            $("#statuss").val(status);
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
