@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Create </strong> Gerbang</h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="create" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('nama_alat') ? ' has-error' : '' }}">
                            <label for="nama_alat" class="col-md-4 control-label">Nama Peralatan</label>

                            <div class="col-md-6">
                                <input id="nama_alat" type="text" class="form-control" name ="nama_alat" value="{{ old('nama_alat') }}" placeholder="Nama Peralatan" required autofocus>

                                @if ($errors->has('nama_alat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_alat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('indikator') ? ' has-error' : '' }}">
                            <label for="indikator" class="col-md-4 control-label">Indikator</label>

                            <div class="col-md-6">
                                <input id="indikator" type="text" class="form-control" name="indikator" placeholder="Indikator" value="{{ old('indikator') }}" required>

                                @if ($errors->has('indikator'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('indikator') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                        

                        <div class="form-group">
                            <label for="deskirpsi" class="col-md-4 control-label">Keterangan</label>

                            <div class="col-md-6">
                                <textarea name="keterangan" placeholder="Keterangan" class="form-control"></textarea>
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
