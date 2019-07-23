@extends('layouts.app')
@section('content')
<br>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<form name="form_real_invoice" action="update" method="post">
				{{ csrf_field() }}
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Transaksi </strong></h3>
				</div>
				<div class="panel panel-body">
					<div class="panel panel-success">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group{{ $errors->has('nama') ? 'has-error' : '' }}">
										<label class="col-md-4 col-xm-5">Nama Gerbang</label>
										<div class="col-md-8 col-xm-8"> 
											<select class="form-control select" name="id_gerbang" data-live-search="true" disabled>
												<option>Pilih Gerbang</option>
												@foreach ($gerbangs as $gerbang)
												<option value="{{$gerbang->id}}" @if($gerbang->id == $transaksiInduk->id_gerbang)selected @endif>{{$gerbang->nomor_gerbang}} - {{$gerbang->nama_gerbang}}</option>
												@endforeach
											</select>										   
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group{{ $errors->has('nama') ? 'has-error' : '' }}">
										<label class="col-md-4 col-xm-5">Shift</label>
										<div class="col-md-8 col-xm-8">										      
											<select class="form-control select" name="id_gerbang" data-live-search="true" disabled>
												<option>Pilih Shift</option>
												<option value="1" @if($transaksiInduk->id_gerbang == 1)selected @endif>1</option>
												<option value="2" @if($transaksiInduk->id_gerbang == 2)selected @endif>1</option>
												<option value="3" @if($transaksiInduk->id_gerbang == 3)selected @endif>1</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group{{ $errors->has('nama') ? 'has-error' : '' }}">
										<label class="col-md-4 col-xm-5">Tanggal</label>
										<div class="col-md-8 col-xm-8"> 
											<div class="form-group has-feedback">
												<input type="text" name="tanggal" id="tanggal" value="{{$today}}" class="form-control" readonly style="color: black;">
											</div>    
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="panel panel-success">
						<div class="row">
							<div class="col-md-6" style="text-align: center;">
								<h3 class="panel-title"><strong>Transaksi Pencatatan Barang Pribadi </strong></h3>
							</div>				
						</div>
						<div class="panel-body">
							<div class="col-md-12" align="center">
								<table class="table table-bordered satu" width="90%" align="center" id="tableWO">
									<thead>
										<tr class="header">
											<th style="vertical-align: middle; text-align: center;" rowspan="2">Nik</th>
											<th style="vertical-align: middle; text-align: center;" rowspan="2">Nama Petugas</th>
											<th style="vertical-align: middle; text-align: center;" colspan="3">Uang</th>
											<th style="vertical-align: middle; text-align: center;" rowspan="2">HP</th>
											<th style="vertical-align: middle; text-align: center;" rowspan="2">Titip</th>
											<th style="vertical-align: middle; text-align: center;" rowspan="2">Keterangan</th>
											<th style="vertical-align: middle; text-align: center;" rowspan="2"></th>
										</tr>
										<tr class="header">
											<th style="text-align: center;">Rp</th>
											<th style="text-align: center;">Terpakai</th>
											<th style="text-align: center;">Sisa</th>
										</tr>									
									</thead>
									<tbody>
										<tr>
											<td>
												<select class="form-control select" name="id_petugas[]" id="id_petugas_1" data-live-search="true">
													<option>Pilih Petugas</option>
													@foreach ($petugas as $petuga)
													<option value="{{$petuga->id}}">{{$petuga->nik}} - {{$petuga->nama_lengkap}}</option>
													@endforeach
												</select>
											</td>
											<td>
												<input type="text" name="nama_petugas[]" id="nama_petugas_1" class="form-control">
											</td>
											<td>
												<input type="text" name="rupiah[]" id="rupiah_1" class="form-control maskMoney">
											</td>
											<td>
												<input type="text" name="terpakai[]" id="terpakai_1" class="form-control maskMoney">
											</td>
											<td>
												<input type="text" name="sisa[]" id="sisa_1" class="form-control maskMoney">
											</td>
											<td>
												<select class="form-control" name="hp[]" id="hp_1">
													<option>Pilih</option>
													<option value="1">Ya</option>
													<option value="2">Tidak</option>
												</select>
											</td>
											<td>
												<select class="form-control" name="titip[]" id="titip_1">
													<option>Pilih</option>
													<option value="1">Ya</option>
													<option value="2">Tidak</option>
												</select>
											</td>
											<td>
												<textarea class="form-control" name="keterangan[]" id="keterangan_1"></textarea>

											</td>
											<td>
												<button onclick="addRow(this.form);" type="button" value="" class="addbutton btn btn-info fa fa-plus" data-placement="top" data-toggle="tooltip" title="Add" style="border: none; color: #ffffff; font-size: 14px; float: right; background-color: #e2b14a; border-radius: 5px; cursor: pointer; padding: 2px; text-align: center; text-decoration: none; width: 25px; height: 25px;"></button>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<div class="panel panel-success">
						<div class="row">
							<div class="col-md-6" style="text-align: center;">
								<h3 class="panel-title"><strong>Laporan Pertanggung Jawaban Pemakaian Uang Kembalian </strong></h3>
							</div>				
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12" align="center">
								<table class="table table-bordered dua" width="90%" align="center" id="tableUkem">
									<thead>
										<tr class="header">
											<th style="text-align: center;"> </th>
											<th style="text-align: center;">UKEM </th>
											<th style="text-align: center;">GOl 1</th>
											<th style="text-align: center;">GOl 2</th>
											<th style="text-align: center;">GOl 3</th>
											<th style="text-align: center;">GOl 4</th>
											<th style="text-align: center;">GOl 5</th>
											<th style="text-align: center;">Jumlah</th>
											<th style="text-align: center;">Sisa</th>
											<th style="text-align: center;"></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td align="center">
												<label id="nomor_1">1</label>								
											</td>
											<td>
												<input type="text" name="ukem_awal[]" id="ukem_awal_1" class="form-control">
											</td>
											<td>
												<input type="text" name="gol_satu[]" id="gol_satu_1" class="form-control maskMoney">
											</td>
											<td>
												<input type="text" name="gol_dua[]" id="gol_dua_1" class="form-control maskMoney">
											</td>
											<td>
												<input type="text" name="gol_tiga[]" id="gol_tiga_1" class="form-control maskMoney">
											</td>
											<td>
												<input type="text" name="gol_empat[]" id="gol_empat_1" class="form-control maskMoney">
											</td>
											<td>
												<input type="text" name="gol_lima[]" id="gol_lima_1" class="form-control maskMoney">
											</td>
											<td>
												<input type="text" name="jumlah[]" id="jumlah_1" class="form-control maskMoney">
											</td>
											<td>
												<input type="text" name="sisa[]" id="sisa_1" class="form-control maskMoney">
											</td>
											<td>
												<button onclick="addRowKembali(this.form);" type="button" value="" class="addbutton btn btn-info fa fa-plus" data-placement="top" data-toggle="tooltip" title="Add" style="border: none; color: #ffffff; font-size: 14px; float: right; background-color: #e2b14a; border-radius: 5px; cursor: pointer; padding: 2px; text-align: center; text-decoration: none; width: 25px; height: 25px;"></button>
											</td>
										</tr>
									</tbody>
								</table>
								</div>
							</div>
						</div>
					</div>

					<div class="panel panel-success">
						<div class="row">
							<div class="col-md-6" style="text-align: center;">
								<h3 class="panel-title"><strong>Form Check List Peralatan Tol </strong></h3>
							</div>				
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12" align="center">
								<table class="table table-bordered dua" width="90%" align="center" id="tablePeralatan">
									<thead>
										<tr class="header">
											<th style="vertical-align: middle;text-align: center;" rowspan="2">No </th>
											<th style="vertical-align: middle;text-align: center;" rowspan="2">Jenis Peralatan</th>
											<th style="vertical-align: middle;text-align: center;" rowspan="2">Indikator</th>
											<th style="vertical-align: middle;text-align: center;" colspan="7">Gardu Lajur</th>
											<th style="vertical-align: middle;text-align: center;" rowspan="2">Keterangan</th>
											<th style="vertical-align: middle;text-align: center;" rowspan="2"></th>
										</tr>
										<tr class="header">
											<th style="text-align: center;">01 </th>
											<th style="text-align: center;">02</th>
											<th style="text-align: center;">03</th>
											<th style="text-align: center;">04</th>
											<th style="text-align: center;">05</th>
											<th style="text-align: center;">06</th>
											<th style="text-align: center;">07</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td colspan="12" style="background-color: #999;"></td>
										</tr>
										@php $no = 1; @endphp
										@foreach($peralatans as $key => $peralatan)
										<tr>
											<td>{{$no+$key}}</td>
											<td>
												<input type="text" name="nama_jenis_peralatan[]" id="nama_jenis_peralatan_1" class="form-control" value="{{$peralatan->nama_alat}}" readonly style="color: black;">
												<input type="hidden" name="id_peralatan[]" id="id_peralatan_1" value="{{$peralatan->id}}">
											</td>
											<td>
												<input type="text" name="nama_jenis_peralatan[]" id="nama_jenis_peralatan_1" class="form-control" value="{{$peralatan->indikator}}" readonly style="color: black;">
											</td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
										@endforeach
									</tbody>
								</table>
								</div>
							</div>
						</div>
					</div>

					<div class="panel panel-success">
						<div class="row">
							<div class="col-md-6" style="text-align: center;">
								<h3 class="panel-title"><strong>Formulir Pengendalian Transaksi </strong></h3>
							</div>				
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12" align="center">
								<table class="table table-bordered dua" width="90%" align="center" id="tablePengendalian">
									<thead>
										<tr class="header">
											<th style="vertical-align: middle;text-align: center;" rowspan="2">No</th>
											<th style="vertical-align: middle;text-align: center;" rowspan="2">Jam </th>
											<th style="vertical-align: middle;text-align: center;" colspan="5">ALR</th>
											<th style="vertical-align: middle;text-align: center;" rowspan="2">RST</th>
											<th style="vertical-align: middle;text-align: center;" rowspan="2">Keterangan</th>
											<th style="vertical-align: middle;text-align: center;" rowspan="2"></th>
										</tr>
										<tr>
											<th style="vertical-align: middle;text-align: center;">LOLOS</th>
											<th style="vertical-align: middle;text-align: center;">ROMB</th>
											<th style="vertical-align: middle;text-align: center;">IND</th>
											<th style="vertical-align: middle;text-align: center;">MM</th>
											<th style="vertical-align: middle;text-align: center;">DNS RSK</th>
										</tr>
									</thead>
									<tbody>
										@php $i = 1; @endphp
										@foreach($gardu as $key => $gardus)
										<tr>
											<td colspan="10"><strong>GARDU 0{{$i+$key}}</strong></td>
										</tr>
										<tr>
											<td>1</td>
											<td>
												<select class="form-control select" name="jam[]" id="jam_1" data-live-search="true">
													<option>Pilih</option>
													<option value="00">00 - 01</option>
													<option value="01">01 - 02</option>
													<option value="02">02 - 03</option>
													<option value="03">03 - 04</option>
													<option value="04">04 - 05</option>
													<option value="05">05 - 06</option>
													<option value="06">06 - 07</option>
													<option value="07">07 - 08</option>
													<option value="08">08 - 09</option>
													<option value="09">09 - 10</option>
													<option value="10">10 - 11</option>
													<option value="11">11 - 12</option>
													<option value="12">12 - 13</option>
													<option value="13">13 - 14</option>
													<option value="14">14 - 15</option>
													<option value="15">15 - 16</option>
													<option value="16">16 - 17</option>
													<option value="17">17 - 18</option>
													<option value="18">18 - 19</option>
													<option value="19">19 - 20</option>
													<option value="20">20 - 21</option>
													<option value="21">21 - 22</option>
													<option value="22">22 - 23</option>
													<option value="23">23 - 24</option>
												</select>
											</td>
											<td>
												<input type="text" name="lolos[]" id="lolos_1" class="form-control">
											</td>
											<td>
												<input type="text" name="rombongan[]" id="rombongan_1" class="form-control">
											</td>
											<td>
												<input type="text" name="indamal[]" id="indamal_1" class="form-control">
											</td>
											<td>
												<input type="text" name="majumundur[]" id="majumundur_1" class="form-control">
											</td>
											<td>
												<input type="text" name="dinasrusak[]" id="dinasrusak_1" class="form-control">
											</td>
											<td>
												<input type="text" name="cancel[]" id="cancel_1" class="form-control">
											</td>
											<td>
												<input type="text" name="lsb[]" id="lsb_1" class="form-control">
											</td>
											<td>
												<button onclick="addRow(this.form);" type="button" value="" class="addbutton btn btn-info fa fa-plus" data-placement="top" data-toggle="tooltip" title="Add" style="border: none; color: #ffffff; font-size: 14px; float: right; background-color: #e2b14a; border-radius: 5px; cursor: pointer; padding: 2px; text-align: center; text-decoration: none; width: 25px; height: 25px;"></button>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12" style="text-align: right;">
					<input type="submit" class="btn btn-primary" id="btnSubmit" value="Simpan"/>
				</div>
			</div>
		</div>
	</div>
</form>
</div>
</div>
</div>

<script type="text/javascript">

	function addRow(id)
	{
		var total_row  = $('#tableWO tbody').find('tr').length;
		var rowNum = total_row +1;

		var strNik = "<?php
                                echo "<option value=''>Pilih Petugas</option>";                                
                                for($c=0;$c<sizeof($petugas);$c++){                                    
                                    echo "<option value='".$petugas[$c]['id']."'>".$petugas[$c]['nik']." - ".$petugas[$c]['nama_lengkap']."</option>";                                    
                                }
                            ?>";

        var row = '<tr id="row'+rowNum+'"><td><select class="form-control select" name="id_petugas[]" id="id_petugas_'+rowNum+'" data-live-search="true">'+strNik+'</select></td><td><input type="text" name="nama_petugas[]" id="nama_petugas_'+rowNum+'" class="form-control"></td><td><input type="text" name="rupiah[]" id="rupiah_'+rowNum+'" class="form-control maskMoney"></td><td><input type="text" name="terpakai[]" id="terpakai_'+rowNum+'" class="form-control maskMoney"></td><td><input type="text" name="sisa[]" id="sisa_'+rowNum+'" class="form-control maskMoney"></td><td><select class="form-control" name="hp[]" id="hp_'+rowNum+'"><option>Pilih</option><option value="1">Ya</option><option value="2">Tidak</option></select></td><td><select class="form-control" name="titip[]" id="titip_'+rowNum+'"><option>Pilih</option><option value="1">Ya</option><option value="2">Tidak</option></select></td><td><textarea class="form-control" name="keterangan[]" id="keterangan_'+rowNum+'"></textarea></td><td><span value="" onclick="removeRow('+rowNum+');" data-placement="top" data-toggle="tooltip" style="border: none; padding: 8px; color: #ffffff; border-radius: 50%; font-size: 11px; background-color: #fc4b6c ; cursor: pointer; text-align: center; width: 25px; height: 25px;"><i class="fa fa-trash-o"></i></span></td></tr>';
        jQuery('#tableWO').append(row);
	}

	function removeRow(rnum) {
    	jQuery('#row'+rnum).remove();
    }

    function addRowKembali(id)
	{
	    var total_row  = $('#tableUkem tbody').find('tr').length;
		var rowNum_dua = total_row +1;
        var rows = '<tr id="rows'+rowNum_dua+'"><td align="center"><label id="nomor_'+rowNum_dua+'">'+rowNum_dua+'</label></td><td><input type="text" name="ukem_awal[]" id="ukem_awal_'+rowNum_dua+'" class="form-control"></td><td><input type="text" name="gol_satu[]" id="gol_satu_'+rowNum_dua+'" class="form-control maskMoney"></td><td><input type="text" name="gol_dua[]" id="gol_dua_'+rowNum_dua+'" class="form-control maskMoney"></td><td><input type="text" name="gol_tiga[]" id="gol_tiga_'+rowNum_dua+'" class="form-control maskMoney"></td><td><input type="text" name="gol_empat[]" id="gol_empat_'+rowNum_dua+'" class="form-control maskMoney"></td><td><input type="text" name="gol_lima[]" id="gol_lima_'+rowNum_dua+'" class="form-control maskMoney"></td><td><input type="text" name="jumlah[]" id="jumlah_'+rowNum_dua+'" class="form-control maskMoney"></td><td><input type="text" name="sisa[]" id="sisa_'+rowNum_dua+'" class="form-control maskMoney"></td><td><span value="" onclick="removeRows('+rowNum_dua+');" data-placement="top" data-toggle="tooltip" style="border: none; padding: 8px; color: #ffffff; border-radius: 50%; font-size: 11px; background-color: #fc4b6c ; cursor: pointer; text-align: center; width: 25px; height: 25px;"><i class="fa fa-trash-o"></i></span></td></tr>';
        jQuery('#tableUkem').append(rows);
	}

	function removeRows(rnum) {
    	jQuery('#rows'+rnum).remove();
    }

    $(document).ready(function(){
    	var id;
		var index;
		var splitid;
		var supplier_id;
		var rowTable = 0;
		$('#btnSubmit').attr('disabled','disabled'); //Disable Button Submit

		$(document).on('blur', '#supplier_id', function(){
			// console.log("supplier_id");
        	supplier_id = $('#supplier_id').val();
        	if (supplier_id){
        		$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});
        		$.ajax({
                    url: '/real_invoice/supplier',
                    type: "POST",
              		data: {supplier_id:supplier_id},
                    dataType: "json",
                    success:function(data) {
						jQuery('#tableSupplier tbody').html('');
						$('#tableSupplier tbody').remove();
						console.log(data);
						var rowSupplier = 0;	
						if(data.length == 0){
							$('#showNotifSupplier').show();
							var row = '<tr class="body"><th style="text-align: left;" colspan="4">Tidak Ada Data</th></tr>';
							$('#tableSupplier').append(row)	
						}else{
							$('#showNotifSupplier').hide();
							$.each(data, function(key, value) {					
								rowSupplier ++;
								console.log(rowSupplier);
								if (data.length == 1) {
									$('#btnAddRow').removeAttr('disabled'); //Enable Button Tambah
									$("#modalSupplier").modal("hide");
									$('#supplier_id').val(value.nama);
									$('#suppliers_id').val(value.id);
								}else{
									$('#btnAddRow').attr('disabled','disabled'); //Disable Button Tambah
									$("#modalSupplier").modal("show");
								} 

								var row = '<tr class="body"><th style="text-align: left;" class="nama_supplier">'+value.nama+'</th><th style="text-align:left;" class="id_supplier hidden">'+value.id+'</th></tr>';
								$('#tableSupplier').append(row);
							}); 	
						}
                    	
                    }
                });			
        	}
			
		});

		$('#tableSupplier').on('click', 'tr', function () {
			$('#btnAddRow').removeAttr('disabled'); //Enable Button Tambah
		    var supplier_id = $(this).closest('tr').children('th.id_supplier').text();
		    var nama_supplier = $(this).closest('tr').children('th.nama_supplier').text();

			$('#supplier_id').val(nama_supplier);
			$('#suppliers_id').val(supplier_id);
			$("#modalSupplier").modal('toggle');

		});	

		$(document).on('blur', '.autocomplete', function() {
			console.log("autocomplete");
			id = this.id;
			splitid = id.split('_');
			index = splitid[1];
        	var search = $('#kode_'+index).val();

        	supplier_id = $('#suppliers_id').val();
        	// console.log(supplier_id);
        	if (search){
        		$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});
        		$.ajax({
                    url: '/real_invoice/kode_barcode',
                    type: "POST",
              		data: {id:search, supplier:supplier_id},
                    dataType: "json",
                    success:function(data) {
						jQuery('#tableList tbody').html('');
						$('#tableList tbody').remove();
						console.log(data);
						if(data.length == 0){
							$('#showNotif_'+index).show();
							var row = '<tr class="body"><th style="text-align: left;" colspan="4">Tidak Ada Data</th></tr>';
							$('#tableList').append(row)	
						}else{
							if (data.length == 1) {
								$.each(data, function(key, value) {			
								    $('#kode_'+index).val(value.kode_barcode);
								    $('#nama_'+index).val(value.nama_barang);
								    $('#qty_'+index).val('1');
								    $('#max_harga_'+index).val(value.price_list.max_harga);
								    $('#min_harga_'+index).val(value.price_list.min_harga);
								    $('#id_'+index).val(value.id);
									$('#harga_'+index).prop('readonly', false);
									$('#qty_'+index).prop('readonly', false);
								}); 
							}else{
                    			$("#myModal").modal("show");	
								$('#showNotif_'+index).hide();
								$.each(data, function(key, value) {
									rowTable ++; 

									var row = '<tr class="body" id="rowNum'+rowTable+'"><th style="text-align: center;" class="kode">'+value.kode_barcode+'</th><th style="text-align:left;" class="nama">'+value.nama_barang+'</th><th style="text-align:left;" class="id hidden">'+value.id+'</th><th style="text-align:left;" class="min_harga hidden">'+value.price_list.min_harga+'</th><th style="text-align:left;" class="max_harga hidden">'+value.price_list.max_harga+'</th></tr>';
									$('#tableList').append(row);
								});
							} 	
						}
                    	
                    }
                });	

    //             $(document).ajaxStart(function(){
	   //  			$("#myModal").modal("hide");	
				// }).ajaxStop(function(){
	   //  			$("#myModal").modal("show");	
				// });			
        	}
		});

		$('#tableList').on( 'click', 'tr', function () {
		    // var id = $(this).closest('tr').attr('id');
		    var kode_barcode = $(this).closest('tr').children('th.kode').text();
		    var nama_barang = $(this).closest('tr').children('th.nama').text();
		    var min_harga = $(this).closest('tr').children('th.min_harga').text();
		    var max_harga = $(this).closest('tr').children('th.max_harga').text();
		    var id_barang = $(this).closest('tr').children('th.id').text();

		    console.log("Min Harga : "+min_harga);
		    console.log("Max Harga : "+max_harga);

		    $('#kode_'+index).val(kode_barcode);
		    $('#nama_'+index).val(nama_barang);
		    $('#qty_'+index).val('1');
		    $('#max_harga_'+index).val(max_harga);
		    $('#min_harga_'+index).val(min_harga);
		    $('#id_'+index).val(id_barang);
			$('#harga_'+index).prop('readonly', false);
			$('#qty_'+index).prop('readonly', false);
			$("#myModal").modal('toggle');

		});	

		$(document).on('input', '.math', function() {
			var id_1 = this.id;
			var splitid_1 = id_1.split('_');
			var index_1 = splitid_1[1];

		    $('#harga_'+index_1).maskMoney({thousands:',', precision: 0});
		    $('#qty_'+index_1).maskMoney({thousands:',', precision: 0});

			$('#harga_'+index_1).keyup(function() { 
				var qty = $('#qty_'+index_1).val().split(',').join("");
				var harga = $(this).val().split(',').join("");
				var total = qty * harga;
				if (harga == 0) {
					checkHarga = false;
					$('#showNotifHarga_'+index_1).show();
				}else{
					checkHarga = true;
					$('#showNotifHarga_'+index_1).hide();
					$('#total_'+index_1).val(toRp(total));
				}
			    update_amounts();
			});
			
			$('#qty_'+index_1).keyup(function(){
				var qty = $(this).val().split(',').join("");
			    var harga = $('#harga_'+index_1).val().split(',').join("");
			    var total = qty * harga;

			    if (qty == 0) {
			    	checkQty = false;
			    	$('#showNotifQty_'+index_1).show();
			    }else{
			    	checkQty = true;
			    	$('#showNotifQty_'+index_1).hide();
			   		$('#total_'+index_1).val(toRp(total));
			    }
			    update_amounts();
			})
		});
	});
	
	$(document).on("keypress", 'form', function (e) {
	    var code = e.keyCode || e.which;
	    if (code == 13) {
	    	$('.autocomplete').blur();
	        e.preventDefault();
	        return false;
	    }
	});

	function toRp(angka){
	    var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
	    var rev2    = '';
	    for(var i = 0; i < rev.length; i++){
	        rev2  += rev[i];
	        if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
	            rev2 += '.';
	        }
	    }
	    return rev2.split('').reverse().join('');
	}

	function toAngka(rp){return parseInt(rp.replace(/,.*|[^0-9]/g, ''), 10);}

	function update_amounts()
	{
	    var sum = 0.0;
	    $('tr.realBody').each(function() {
	        var total = $(this).find('.total').val();
	        var totalAngka = toAngka('Rp'+total);
	        if(isNaN(totalAngka)) {
				totalAngka = 0;
			}
	        if(totalAngka != 0){
	        	sum+=totalAngka;
	        }
	    });
	    //just update the total to sum  
	    $('#total_harga').text(toRp(sum));
	    $('#total_hargas').val(sum);
	}

	function validateForm() {
		var bool = false;
	    var tanggal = document.forms["form_real_invoice"]["tanggal"].value;
	    var harga = document.forms["form_real_invoice"]["total_hargas"].value;
	    var tanggal_estimasi = document.forms["form_real_invoice"]["tanggal_estimasi"].value;
	    // var harga = document.table["tableWO"][".qty"].value;
	    // console.log(harga);
	    if (tanggal == "") {
	        $('#showNotifTanggal').show();
	        bool = false;
	    }else{
	    	$('#showNotifTanggal').hide();
	    	if (tanggal_estimasi == "") {
    			$('#showNotifTanggalEstimasi').show();
    		}else{
    			$('#showNotifTanggalEstimasi').hide();
				if (harga == 0) {
	    			checkHarga = false;
	    			if (numRow > 0) {
	    				$('#showNotifHarga_1').show();	
	    			}	    			
	    		}else{
	    			if (!checkHarga) {
		    			bool = false;		
	    			}else{
	    				bool = true;
	    			}
	    		}
    		}
	    }
	    return bool;
	}
</script>
@endsection 