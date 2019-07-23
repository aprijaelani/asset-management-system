<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gerbang extends Model
{
    use SoftDeletes;

    protected $table = 'mgt_mgerbang';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nomor_gerbang','nama_gerbang','deskripsi','created_by','updated_by'
    ];


    public function gardu()
    {
    	return $this->hasMany('App\Gardu');
    }

    public function transaksiInduk()
    {
        return $this->hasMany('App\TransaksiInduk');
    }
}
