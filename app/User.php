<?php

namespace App;

use App\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;

    use SoftDeletes;

    protected $table = 'mgt_user';

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nik','username','password','nama_lengkap','email','telepon','alamat','level','status','unit_kerja','foto'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->hasOne(Role::class);
    }

    public function isAdmin()
    {
        if($this->role && $this->role->admin == true){
            return true;
        }
        return false;
    }

    public function isSpl()
    {
        if($this->role && $this->role->spl == true){
            return true;
        }
        return false;
    }

    public function isUser()
    {
        if($this->role && $this->role->user == true){
            return true;
        }
        return false;
    }

}
