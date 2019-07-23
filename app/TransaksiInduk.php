<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransaksiInduk extends Model
{
	use SoftDeletes;

    protected $table = 'mgt_transaksi_induk';

    protected $dates = ['deleted_at'];

    protected $fillable = [
    	'tanggal','id_gerbang','shift','created_by','updated_by'
    ];

    public function gerbang ()
    {
    	return $this->belongsTo('App\Gerbang', 'id_gerbang');
    }
}
