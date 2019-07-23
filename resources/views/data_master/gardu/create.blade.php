@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Create </strong> Gardu</h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="create" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('id_gerbang') ? ' has-error' : '' }}">
                            <label for="id_gerbang" class="col-md-4 control-label">Nama Gerbang</label>

                            <div class="col-md-6">
                                 <select class="form-control select" name="id_gerbang" data-live-search="true" required>
                                    <option>Pilih Gerbang</option>
                                    @foreach ($gerbangs as $gerbang)
                                    <option value="{{$gerbang->id}}">{{$gerbang->nomor_gerbang}} - {{$gerbang->nama_gerbang}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('id_gerbang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_gerbang') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                                            

                        <div class="form-group{{ $errors->has('nomor_gardu') ? ' has-error' : '' }}">
                            <label for="nomor_gardu" class="col-md-4 control-label">Nomor Gardu</label>

                            <div class="col-md-6">
                                <input id="nomor_gardu" type="text" class="form-control" name ="nomor_gardu" value="{{ old('nomor_gardu') }}" placeholder="Nomor Gardu" required autofocus>

                                @if ($errors->has('nomor_gardu'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nomor_gardu') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nama_gardu') ? ' has-error' : '' }}">
                            <label for="nama_gardu" class="col-md-4 control-label">Nama Gardu</label>

                            <div class="col-md-6">
                                <input id="nama_gardu" type="text" class="form-control" name="nama_gardu" placeholder="Nama Gardu" value="{{ old('nama_gardu') }}" required>

                                @if ($errors->has('nama_gardu'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_gardu') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                        

                        <div class="form-group">
                            <label for="deskirpsi" class="col-md-4 control-label">Deskripsi</label>

                            <div class="col-md-6">
                                <textarea name="deskripsi" placeholder="Deskripsi" class="form-control"></textarea>
                            </div>
                        </div>                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
