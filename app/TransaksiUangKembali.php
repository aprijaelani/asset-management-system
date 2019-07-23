<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransaksiUangKembali extends Model
{
    use SoftDeletes;

    protected $table = 'mgt_trxukem';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id_transaksi','id_petugas','id_gerbang','tanggal','shift','uang_titip','uang_terpakai','uang_sisa','hp','titip','keterangan'
    ];
}
