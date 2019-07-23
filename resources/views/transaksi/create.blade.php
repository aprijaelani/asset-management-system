@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Create </strong> Transaksi</h3>
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

                        <div class="form-group{{ $errors->has('shift') ? ' has-error' : '' }}">
                            <label for="shift" class="col-md-4 control-label">Shift</label>

                            <div class="col-md-6">
                                <select class="form-control select" name="shift" data-live-search="true" required>
                                    <option>Pilih Shift</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>

                                @if ($errors->has('shift'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('shift') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tanggal') ? ' has-error' : '' }}">
                            <label for="tanggal" class="col-md-4 control-label">Tanggal</label>

                            <div class="col-md-6">
                                <input type="text" id="dp-3" class="form-control" value="{{$today}}" data-date="{{$today}}" data-date-format="dd-mm-yyyy" data-date-viewmode="years" name="tanggal" />

                                @if ($errors->has('tanggal'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tanggal') }}</strong>
                                    </span>
                                @endif
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
<script type="text/javascript">
    $(function() {                                
        $("#dp-2,#dp-3,#dp-4").datepicker(); // Sample
    });
</script>
@endsection