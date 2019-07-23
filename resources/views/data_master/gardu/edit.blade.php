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
						<label class="col-md-4 control-label">Nama Gerbang</label>
						<div class="col-md-4">                                            
							<select class="form-control select" name="id_gerbang" data-live-search="true" required>
                                <option>Pilih Gerbang</option>
                                @foreach ($gerbangs as $gerbang)
                                <option value="{{$gerbang->id}}" @if($gardu->id_gerbang == $gerbang->id) selected @endif>{{$gerbang->nomor_gerbang}} - {{$gerbang->nama_gerbang}}</option>
                                @endforeach
                            </select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">Nomor Gardu</label>
						<div class="col-md-4">                                            
							<input type="text" value="{{ old('nomor_gardu') ?: $gardu->nomor_gardu }}" name="nomor_gardu" id="nomor_gardu" class="form-control" placeholder="Nomor Gardu"/>
							{!! $errors->first('nomor_gardu', '<span class="help-block">:message</span>')!!}
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Nama Gardu</label>
						<div class="col-md-4">                                            
							<input type="text" value="{{ old('nama_gardu') ?: $gardu->nama_gardu }}" name="nama_gardu" id="nama_gardu" class="form-control" placeholder="nama_gardu"/>
							{!! $errors->first('nama_gardu', '<span class="help-block">:message</span>')!!}
						</div>
					</div>
					
					<div class="form-group">
						<label for="password-confirm" class="col-md-4 control-label">Deskripsi</label>

						<div class="col-md-4">
							<textarea class="form-control" name="deskripsi" placeholder="Deskripsi">{{$gardu->deskripsi}}</textarea>
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