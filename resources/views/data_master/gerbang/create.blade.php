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
                    <form class="form-horizontal" role="form" method="POST" action="http://localhost/project_baru/public/api/products" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nama_gerbang') ? ' has-error' : '' }}">
                            <label for="nama_gerbang" class="col-md-4 control-label">Nama Gerbang</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" placeholder="Nama Gerbang" value="{{ old('name') }}" required>

                                @if ($errors->has('nama_gerbang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_gerbang') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                        

                        <div class="form-group">
                            <label for="deskirpsi" class="col-md-4 control-label">Deskripsi</label>

                            <div class="col-md-6">
                                <textarea name="detail" placeholder="Deskripsi" class="form-control"></textarea>
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
