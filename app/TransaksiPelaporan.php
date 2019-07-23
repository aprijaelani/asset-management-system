<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransaksiPelaporan extends Model
{
    use SoftDeletes;

    protected $table = 'mgt_trxperalatan';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id_transaksi','id_peralatan','id_gerbang','id_user','indicator','tanggal','shift','keterangan'
    ];
}
