<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gardu extends Model
{
    use SoftDeletes;

    protected $table = 'mgt_mgardu';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id_gerbang','nomor_gardu','nama_gardu','deskripsi','created_by','updated_by'
    ];

    public function gerbang ()
    {
    	return $this->belongsTo('App\Gerbang', 'id_gerbang');
    }
}
