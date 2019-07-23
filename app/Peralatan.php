<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Peralatan extends Model
{
    use SoftDeletes;

    protected $table = 'mgt_mperalatan';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nama_alat','indikator','keterangan','created_by','updated_by'
    ];
}
