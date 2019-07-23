@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-12">
		<form class="form-horizontal" method="post" action="update" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Edit Data </strong> User</h3>
					<ul class="panel-controls">
						<li><a href="" class="panel-remove"><span class="fa fa-times"></span></a></li>
					</ul>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-md-4 control-label">Nik</label>
						<div class="col-md-4">                                            
							<input type="text" value="{{ old('nik') ?: $user->nik }}" name="nik" id="nik" class="form-control" placeholder="Nik"/>
							{!! $errors->first('nik', '<span class="help-block">:message</span>')!!}
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Username</label>
						<div class="col-md-4">                                            
							<input type="text" value="{{ old('username') ?: $user->username }}" name="username" id="username" class="form-control" placeholder="Username"/>
							{!! $errors->first('username', '<span class="help-block">:message</span>')!!}
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Nama Lengkap</label>
						<div class="col-md-4">                                            
							<input type="text" value="{{ old('nama_lengkap') ?: $user->nama_lengkap }}" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Name Lengkap"/>
							{!! $errors->first('name', '<span class="help-block">:message</span>')!!}
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Email Address</label>
						<div class="col-md-4">                                            
							<input type="text" value="{{ old('email') ?: $user->email }}" name="email" id="email" class="form-control" placeholder="Email"/>
							{!! $errors->first('email', '<span class="help-block">:message</span>')!!}
						</div>
					</div>
					<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
						<label for="password" class="col-md-4 control-label">Password</label>

						<div class="col-md-4">
							<input id="password" type="password" class="form-control" name="password">

							@if ($errors->has('password'))
							<span class="help-block">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
							@endif
						</div>
					</div>

					<div class="form-group">
						<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

						<div class="col-md-4">
							<input id="password-confirm" type="password" class="form-control" name="password_confirmation"	>
						</div>
					</div>
					
					<div class="form-group">
						<label for="password-confirm" class="col-md-4 control-label">Alamat</label>

						<div class="col-md-4">
							<textarea class="form-control" name="alamat">{{$user->alamat}}</textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">Telepon</label>
						<div class="col-md-4">                                            
							<input name="telepon" value="{{ old('telepon') ?: $user->telepon }}" id="telepon" type="number" class="form-control" placeholder="Telepon"/>     
							{!! $errors->first('telepon', '<span class="help-block">:message</span>')!!}        
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Level</label>
						<div class="col-md-4">
							<select class="form-control select" name="level" data-live-search="true" required>
								<option>Pilih Level</option>
                                <option @if ($user->level == 1) selected @endif value="1">Admin</option>
                                <option value="2" @if ($user->level == 2) selected @endif>Input</option>
                                <option value="3" @if ($user->level == 3) selected @endif>Pelapor</option>
                                <option value="4" @if ($user->level == 4) selected @endif>Kepala</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="password-confirm" class="col-md-4 control-label">Unit Kerja</label>

						<div class="col-md-4">
							<select class="form-control select" name="unit_kerja" data-live-search="true" required>
								<option>Pilih Unit Kerja</option>
                                <option value="1" @if ($user->unit_kerja == 1) selected @endif>Organik</option>
                                <option value="2" @if ($user->unit_kerja == 2) selected @endif>Non Organik</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="password-confirm" class="col-md-4 control-label">Foto</label>

						<div class="col-md-4">
							<img src="/uploads/foto/{{ $user->foto }}" alt="" style="width: 150px;height: 150px;text-align: center;">
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