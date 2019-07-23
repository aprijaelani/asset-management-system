@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-12">
		<form class="form-horizontal" method="post" action="update" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Edit Data </strong> Gerbang</h3>
					<ul class="panel-controls">
						<li><a href="" class="panel-remove"><span class="fa fa-times"></span></a></li>
					</ul>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-md-4 control-label">Nomor gerbang</label>
						<div class="col-md-4">                                            
							<input type="text" value="{{ old('nomor_gerbang') ?: $gerbang->nomor_gerbang }}" name="nomor_gerbang" id="nomor_gerbang" class="form-control" placeholder="Nomor Gerbang"/>
							{!! $errors->first('nomor_gerbang', '<span class="help-block">:message</span>')!!}
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Nama Gerbang</label>
						<div class="col-md-4">                                            
							<input type="text" value="{{ old('nama_gerbang') ?: $gerbang->nama_gerbang }}" name="nama_gerbang" id="nama_gerbang" class="form-control" placeholder="nama_gerbang"/>
							{!! $errors->first('nama_gerbang', '<span class="help-block">:message</span>')!!}
						</div>
					</div>
					
					<div class="form-group">
						<label for="password-confirm" class="col-md-4 control-label">Deskripsi</label>

						<div class="col-md-4">
							<textarea class="form-control" name="deskripsi" placeholder="Deskripsi">{{$gerbang->deskripsi}}</textarea>
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