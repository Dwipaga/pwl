@extends('Layout.template')
@section('content')
<div class="card-body" style="margin-left: 250px;">

  <button class="btn btn-sm btn-success my-2" data-toggle="modal" data-target="#modal_mahasiswa">Tambah Data</button>
    <table class="table table-bordered table-striped" id="data_mahasiswa">
      <thead>
        <tr>
          <th>No</th>
          <th>NIM</th>
          <th>Nama</th>
          <th>Foto</th>
          <th>JK</th>
          <th>HP</th>
          <th>Kelas</th>
          <th>Action</th>
        </tr>
      </thead>
    </table>
  </div>
  <!-- /.card-body -->
  <div class="modal fade" id="modal_mahasiswa" style="display: none;" aria-hidden="true">
    <form method="post" enctype="multipart/form-data" action="{{ url('mahasiswa') }}" role="form" class="form-horizontal"
     id="form_mahasiswa">
    @csrf
    <div class="modal-dialog modal-">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Input Mahasiswa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row form-message"></div>
                <div class="form-group required row mb-2">
                    <label class="col-sm-2 control-label col-form-label">NIM</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" id="nim" name="nim" value="" />
                    </div>
                </div>
          <div class="form-group required row mb-2">
                    <label class="col-sm-2 control-label col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" id="nama" name="nama" value="" />
                    </div>
                </div>
                <div class="form-group required row mb-2">
                  <label class="col-sm-2 control-label col-form-label">Foto</label>
                  <div class="col-sm-10">
                      <input type="file" class="form-control form-control-sm" id="foto" name="foto" value="" />
                  </div>
                </div>
                <div class="form-group required row mb-2">
                  <label class="col-sm-2 control-label col-form-label">JK</label>
                  <div class="col-sm-10">
                     <select name="jk" id="jk" class="form-control form-control-sm">
                      <option value="p">Perempuan</option>
                      <option value="l">Laki-Laki</option>
                     </select>
                  </div>
                </div>
                <div class="form-group required row mb-2">
                  <label class="col-sm-2 control-label col-form-label">Tgl. Lahir</label>
                  <div class="col-sm-10">
                      <input type="date" class="form-control form-control-sm" id="tanggal_lahir" name="tanggal_lahir"/>
                  </div>
                </div>
                <div class="form-group required row mb-2">
                  <label class="col-sm-2 control-label col-form-label">Tempat Lahir</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control form-control-sm" id="tempat_lahir" name="tempat_lahir"/>
                  </div>
                </div>
                <div class="form-group required row mb-2">
                  <label class="col-sm-2 control-label col-form-label">Alamat</label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control form-control-sm" id="alamat" name="alamat"/>
                  </div>
                </div>
                <div class="form-group required row mb-2">
                    <label class="col-sm-2 control-label col-form-label">No. HP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" id="hp" name="hp" value="" />
                    </div>
                </div>
                <div class="form-group required row mb-2">
                  <label class="col-sm-2 control-label col-form-label">Kelas</label>
                  <div class="col-sm-10">
                    <select name="kelas" id="kelas" class="form-control form-control-sm">
                      @foreach($kls as $kls)
                      <option value="{{ $kls->id }}">{{ $kls->nama_kelas }}</option>
                      @endforeach
                     </select>
                  </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
    </form>
</div>

<div class="modal fade" id="detail" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title fs-5" id="exampleModalLabel">Detail Mahasiswa</h4>
      </div>
      <div class="modal-body">
        <h6>Nama: <span id="nama_detail"></span></h6>
        <h6>NIM: <span id="nim_detail"></span></h6>
        <h6>Jenis Kelamin: <span id="jk_detail"></span></h6>
        <h6>Tempat Lahir: <span id="tempat_lahir_detail"></span></h6>
        <h6>Tanggal Lahir: <span id="tanggal_lahir_detail"></span></h6>
        <h6>Alamat: <span id="alamat_detail"></span></h6>
        <h6>No. Telepon <span id="hp_detail"></span></h6>
        <h6>Kelas: <span id="kelas_detail"></span></h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection
@push('custom_js')
<script>
  function updateData(th){
        $('#modal_mahasiswa').modal('show');
        $('#modal_mahasiswa .modal-title').html('Edit Data Mahasiswa');
        $('#modal_mahasiswa #nim').val($(th).data('nim'));
        $('#modal_mahasiswa #nama').val($(th).data('nama'));
        $('#modal_mahasiswa #hp').val($(th).data('hp'));
        $('#modal_mahasiswa #jk').val($(th).data('jk'));
        $('#modal_mahasiswa #tempat_lahir').val($(th).data('tempat_lahir'));
        $('#modal_mahasiswa #tanggal_lahir').val($(th).data('tanggal_lahir'));
        $('#modal_mahasiswa #alamat').val($(th).data('alamat'));
        $('#modal_mahasiswa #kelas').val($(th).data('kelas'));
        $('#modal_mahasiswa #form_mahasiswa').attr('action', $(th).data('url'));
        $('#modal_mahasiswa #form_mahasiswa').append('<input type="hidden" name="_method" value="PUT">');
    }
    function showData(th){
      $('#detail').modal('show');
        $('#detail #nim_detail').html($(th).data('nim'));
        $('#detail #nama_detail').html($(th).data('nama'));
        $('#detail #hp_detail').html($(th).data('hp'));
        $('#detail #jk_detail').html($(th).data('jk'));
        $('#detail #tempat_lahir_detail').html($(th).data('tempat_lahir'));
        $('#detail #tanggal_lahir_detail').html($(th).data('tanggal_lahir'));
        $('#detail #alamat_detail').html($(th).data('alamat'));
        $('#detail #kelas_detail').html($(th).data('kelas'));
    }
    function deleteData(th) {
            var url = $(th).data('url');
            var c = confirm('Apakah anda yakin ingin menghapus data ini?');
            if (c == true) {
                $.ajax({
                    url: url,
                    method: "POST",
                    data: {
                        _method: 'DELETE',
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.status) {
                            alert(data.message);
                            dataMahasiswa.ajax.reload();
                        } else {
                            alert(data.message);
                        }
                    }
                });
            }
        }
  $(document).ready(function (){
      var dataMahasiswa = $('#data_mahasiswa').DataTable({
          processing:true,
          serverSide:true,
          ajax:{
              'url': '{{  url('mahasiswa/data') }}',
              'dataType': 'json',
              'type': 'POST',
          },
          columns:[
              {data:'nomor', name:'nomor', searchable:false, sortable:false},
              {data:'nim',name:'nim', sortable: false, searchable: true},
              {data:'nama',name:'nama', sortable: false, searchable: true},
              {data:'foto',name:'foto', sortable: false, searchable: true},
              {data:'jk',name:'jk', sortable: false, searchable: true},
              {data:'hp',name:'hp', sortable: false, searchable: true},
              {data:'kelas.nama_kelas',name:'kelas.nama_kelas', sortable: false, searchable: true},
              {data:'id',name:'id', sortable: false, searchable: false,
                  render: function(data, type, row, meta){
                      var btn = `<button data-url="{{ url('/mahasiswa')}}/`+data+`" class="btn btn-xs btn-warning" 
                                onclick="updateData(this)" data-id="`+row.id+`" data-nim="`+row.nim+`" data-nama="`+row.nama+`" 
                                data-hp="`+row.hp+`" data-jk="`+row.jk+`" data-tanggal_lahir="`+row.tanggal_lahir+`" 
                                data-tempat_lahir="`+row.tempat_lahir+`" data-alamat="`+row.alamat+`" data-kelas="`+row.kelas_id+`"><i class="fa fa-edit"></i> Edit</button>` +
                                `<button data-url="{{ url('/mahasiswa') }}/`+data+`" data-toggle="modal" onclick="showData(this)" 
                                data-target="#detail" class="btn btn-xs btn-info" data-id="`+row.id+`" data-nim="`+row.nim+`" 
                                data-nama="`+row.nama+`" data-hp="`+row.hp+`" data-jk="`+row.jk+`" data-tanggal_lahir="`+row.tanggal_lahir+`" data-tempat_lahir="`+row.tempat_lahir+`" data-alamat="`+row.alamat+`" data-kelas="`+row.kelas.nama_kelas+`"><i class="fa fa-list" ></i> Detail</button>` +
                                `<button data-url="{{ url('/mahasiswa') }}/` + data + `" type="submit" class="btn btn-xs btn-danger" onclick="deleteData(this)"><i class="fa fa-trash"></i> Hapus</button>`;
                      return btn;
                  }
              },

          ]
      });
      $('#form_mahasiswa').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                method: "POST",
                data: $(this).serialize(),
                dataType: 'json',
                success:function(data){
                    $('.form-message').html('');
                    if(data.status){
                        $('.form-message').html('<span class="alert alert-success" style="width: 100%">' + data.message + '</span>');
                        $('#form_mahasiswa')[0].reset();
                        dataMahasiswa.ajax.reload();
                        $('#form_mahasiswa').attr('action', '{{ url('mahasiswa') }}');
                        $('#form_mahasiswa').find('input[name="_method"]').remove();
                    }else{
                        $('.form-message').html('<span class="alert alert-danger" style="width: 100%">' + data.message + '</span>');
                        alert('error');
                    }

                    if(data.modal_close){
                        $('.form-message').html('');
                        $('#modal_mahasiswa').modal('hide');
                    }

                }
            });
        });
  });
  </script>
@endpush