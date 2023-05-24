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
                <h3 class="card-title">Mahasiswa</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" style="margin-left: 50px;">
                <form method="post" action="{{ $url_form }}" enctype="multipart/form-data">
                    @csrf
                    {!! (isset($mhs))? method_field('PUT') : '' !!}

                    <div class="form-group">
                        <label>NIM</label>
                        <input class="form-control @error('nim') {{ 'is-invalid' }} @enderror" type="text" value="{{ isset($mhs)? $mhs->nim : old('nim') }}" name="nim">
                        @error('nim')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control @error('nama') {{ 'is-invalid' }} @enderror" type="text" value="{{ isset($mhs)? $mhs->nama : old('nama') }}" name="nama">
                        @error('nama')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <input class="form-control @error('jk') {{ 'is-invalid' }} @enderror" type="text" value="{{ isset($mhs)? $mhs->jk : old('jk') }}" name="jk">
                        @error('jk')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>tempat lahir</label>
                        <input class="form-control @error('tempat_lahir') {{ 'is-invalid' }} @enderror" type="text" value="{{ isset($mhs)? $mhs->tempat_lahir : old('tempat_lahir') }}" name="tempat_lahir">
                        @error('tempat_lahir')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>tanggal lahir</label>
                        <input class="form-control @error('tanggal_lahir') {{ 'is-invalid' }} @enderror" type="date" value="{{ isset($mhs)? $mhs->tanggal_lahir : old('tanggal_lahir') }}" name="tanggal_lahir">
                        @error('tanggal_lahir')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input class="form-control @error('alamat') {{ 'is-invalid' }} @enderror" type="text" value="{{ isset($mhs)? $mhs->alamat : old('alamat') }}" name="alamat">
                        @error('alamat')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>No.Hp</label>
                        <input class="form-control @error('hp') {{ 'is-invalid' }} @enderror" type="text" value="{{ isset($mhs)? $mhs->hp : old('hp') }}" name="hp">
                        @error('hp')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select id="kelas" class="form-control @error('kelas') {{ 'is-invalid' }} @enderror" type="text" value="{{ isset($mhs)? $mhs->kelas : old('kelas') }}" name="kelas">
                            @foreach ($kelas as $kls)
                            <option value="{{ $kls->id }}">{{ $kls->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input class="form-control @error('foto') is-invalid @else mb-3 @enderror" type="file" name="foto" value="{{ isset($mhs)? $mhs->foto : old('foto') }}" name="foto">
                        @error('foto')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                        @if (isset($mhs))
                            <p>Foto Sebelumnya</p>
                            <img src="{{ asset($mhs->foto) }}" alt="" width="100px" style="overflow: ">
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">submit</button>

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