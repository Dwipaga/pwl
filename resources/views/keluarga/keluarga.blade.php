@extends('Layout.template')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1></h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Keluarga</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <a href="{{url('keluarga/create')}}" class="btn btn-sm btn-success my-2">Tambah Data</a>
      <table class="table table-bordered tabel-hover">
      <thead>
        <tr>
          <th>No.</th>
          <th>KTP</th>
          <th>Nama</th>
          <th>Jenis Kelamin</th>
          <th>Tempat Lahir</th>
          <th>Tanggal Lahir</th>
          <th>Alamat</th>
          <th>No. Hp</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
          @if($klg->count() > 0)
              @foreach($klg as $i => $k)
                <tr>
                  <td>{{++$i}}</td>
                  <td>{{ $k->ktp }}</td>
                  <td>{{ $k->nama }}</td>
                  <td>{{ $k->jk }}</td>
                  <td>{{ $k->tempat_lahir }}</td>
                  <td>{{ $k->tanggal_lahir}}</td>
                  <td>{{ $k->alamat }}</td>
                  <td>{{ $k->hp }}</td>
                  <td>
                    <!-- Bikin tombol edit dan delete -->
                    <a href="{{ url('/keluarga/'. $k->ktp.'/edit') }}" class="btn btn-sm btn-warning">edit</a>

                    <form method="POST" action="{{ url('/keluarga/'.$k->ktp) }}" >
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger">hapus</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            @else
              <tr><td colspan="6" class="text-center">Data tidak ada</td></tr>
            @endif
          </tbody>
      </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
@endsection
@push('custom_js')
<script>
</script>
@endpush