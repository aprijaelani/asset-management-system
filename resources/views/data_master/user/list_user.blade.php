@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-md-12">

    <!-- START DEFAULT DATATABLE -->
    <div class="panel panel-default">
      <div class="panel-heading">                                
        <h3 class="panel-title">List Data User</h3>
        <ul class="panel-controls">
          <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
          <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
          <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
        </ul>                                
      </div>
      <br>
      <div class="pull-left" style="margin-top: 10px;margin-left: 13px;">
        <a href="/user/create" class="btn btn-info btn-lg">Add User</a>
      </div>
      <div class="panel-body">
        <table class="table datatable">
          <thead>
            <tr>
              <th>Id</th>
              <th>Nik</th>
              <th>Username</th>
              <th>Nama Lengkap</th>
              <th>Email</th>
              <th>Telepon</th>
              <th>Alamat Lengkap</th>
              <th>Level</th>
              <th>Unit Kerja</th>
              <th>Foto</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach($users as $user)
            <tr>
              <td>{{$user->id}}</td>
              <td>{{$user->nik}}</td>
              <td>{{$user->username}}</td>
              <td>{{$user->nama_lengkap}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->telepon}}</td>
              <td>{{$user->alamat}}</td>
              @if($user->level == 1)
              <td>{{'Admin'}}</td>
              @elseif($user->level == 2)
              <td>{{'Input'}}</td>
              @elseif($user->level == 3)
              <td>{{'Pelapor'}}</td>
              @else
              <td>{{'Kepala'}}</td>
              @endif
              @if($user->unit_kerja == 1)
              <td>{{'Organik'}}</td>
              @else
              <td>{{'Non Organik'}}</td>
              @endif
              <td><img src="/uploads/foto/{{ $user->foto }}" alt="" style="width: 100px;height: 100px;text-align: center;"></td>
              @if($user->status == 1)
              <td>{{'Active'}}</td>
              @else
              <td>{{'Not Active'}}</td>
              @endif
              <td>
                <a href="/user/{{ $user->id }}/edit" class="btn btn-primary btn-sm">Edit</a>
                <button class="delete-modal btn btn-danger btn-sm" data-id="{{$user->id}}">Delete</button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- Delete modal -->
      <div class="modal fade bs-example-modal-sm3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-md" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Delete Data</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
                {{ csrf_field() }}
                <input type="hidden" name="id-delete" id="id-delete">
                <p>Yakin Ingin Menghapus Data? </p>
              </div>
              <div class="form-group" align="right">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" id="delete" class="btn btn-danger" data-dismiss="modal">Delete</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END DEFAULT DATATABLE -->
  </div>
</div>
<script type="text/javascript">
  $(document).on('click', '.delete-modal', function() {
    $('#id-delete').val($(this).data('id'));
    $('.bs-example-modal-sm3').modal('show');
  });
  $("#delete").click(function() {
    $.ajax({
      type: 'post',
      url: '/user/delete',
      data: {
        '_token': $('input[name=_token]').val(),
        'id' : $('input[name=id-delete]').val()
      },
      success: function(data) {
        $('.item' + data.id).remove();
        toastr.success("Data Berhasil Dihapus.");
        location.href = "/user"
      }
    });
  });
</script>
@endsection