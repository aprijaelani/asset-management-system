@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-12">
		<form class="form-horizontal" method="post" action="update" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Edit Data </strong> Peralatan</h3>
					<ul class="panel-controls">
						<li><a href="" class="panel-remove"><span class="fa fa-times"></span></a></li>
					</ul>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label class="col-md-4 control-label">Nama Peralatan</label>
						<div class="col-md-4">                                            
							<input type="text" value="{{ old('nama_alat') ?: $peralatan->nama_alat }}" name="nama_alat" id="nama_alat" class="form-control" placeholder="Nama Peralatan"/>
							{!! $errors->first('nama_alat', '<span class="help-block">:message</span>')!!}
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Indikator</label>
						<div class="col-md-4">                                            
							<input type="text" value="{{ old('indikator') ?: $peralatan->indikator }}" name="indikator" id="indikator" class="form-control" placeholder="Indikator"/>
							{!! $errors->first('indikator', '<span class="help-block">:message</span>')!!}
						</div>
					</div>
					
					<div class="form-group">
						<label for="password-confirm" class="col-md-4 control-label">Keterangan</label>

						<div class="col-md-4">
							<textarea class="form-control" name="keterangan" placeholder="Keterangan">{{$peralatan->keterangan}}</textarea>
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