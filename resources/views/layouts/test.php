@extends('layouts.template')
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
        <h3 class="card-title">Member</h3>

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
        <form method="POST" action="{{ $url_form }}">
            @csrf
            {!! (isset($mbr))? method_field('PUT') : '' !!}

            <div class="form-group">
                        <label>Kode Jasa</label>
                        <input class="form-control" @error('kode_jasa') is-invalid @enderror type="text" value="{{ isset($js)? $js->kode_jasa : old('kode_jasa') }}" name="kode_jasa">
                        @error('kode_jasa')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Jenis Jasa</label>
                        <input class="form-control" @error('jenis_jasa') is-invalid @enderror type="text" value="{{ isset($js)? $js->jenis_jasa : old('jenis_jasa') }}" name="jenis_jasa">
                        @error('jenis_jasa')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Nama Jasa</label>
                        <input class="form-control" @error('nama_jasa') is-invalid @enderror type="text" value="{{ isset($js)? $js->nama_jasa : old('nama_jasa') }}" name="nama_jasa">
                        @error('nama_jasa')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Harga</label>
                        <input class="form-control" @error('harga') is-invalid @enderror type="text" value="{{ isset($js)? $js->harga : old('harga') }}" name="harga">
                        @error('harga')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

            <button type="submit" class="btn btn-sm btn-success my-2">Submit</button>
        </form>
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