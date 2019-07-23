@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-12">
		<form class="form-horizontal" method="post" action="update" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Edit Data </strong> Petugas</h3>
					<ul class="panel-controls">
						<li><a href="" class="panel-remove"><span class="fa fa-times"></span></a></li>
					</ul>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-md-4 control-label">Nik</label>
						<div class="col-md-4">                                            
							<input type="text" value="{{ old('nik') ?: $petugas->nik }}" name="nik" id="nik" class="form-control" placeholder="Nik"/>
							{!! $errors->first('nik', '<span class="help-block">:message</span>')!!}
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">Nama Lengkap</label>
						<div class="col-md-4">                                            
							<input type="text" value="{{ old('nama_lengkap') ?: $petugas->nama_lengkap }}" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Name Lengkap"/>
							{!! $errors->first('name', '<span class="help-block">:message</span>')!!}
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">Email Address</label>
						<div class="col-md-4">                                            
							<input type="text" value="{{ old('email') ?: $petugas->email }}" name="email" id="email" class="form-control" placeholder="Email"/>
							{!! $errors->first('email', '<span class="help-block">:message</span>')!!}
						</div>
					</div>					
					
					<div class="form-group">
						<label for="password-confirm" class="col-md-4 control-label">Alamat</label>

						<div class="col-md-4">
							<textarea class="form-control" name="alamat">{{$petugas->alamat}}</textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">Telepon</label>
						<div class="col-md-4">                                            
							<input name="telepon" value="{{ old('telepon') ?: $petugas->telepon }}" id="telepon" type="number" class="form-control" placeholder="Telepon"/>     
							{!! $errors->first('telepon', '<span class="help-block">:message</span>')!!}        
						</div>
					</div>					

					<div class="form-group">
						<label for="password-confirm" class="col-md-4 control-label">Foto</label>

						<div class="col-md-4">
							<img src="/uploads/petugas/{{ $petugas->foto }}" alt="" style="width: 150px;height: 150px;text-align: center;">
							<input type="file" name="foto" class="fileinput" id="filename1"/>
						</div>
					</div>

				</div>
				<div class="panel-footer">
					<div class="col-sm-offset-2 col-sm-10">
						<button class="btn btn-primary">Clear Form</button>                            
						<button class="btn btn-info pull-right">Update</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>   
@endsection