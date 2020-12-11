<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primaryKey = "id_user";
    protected $fillable = [
        'username', 'password',"jenis_user"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function poli()
    {
        return $this->hasOne("App\Poli", "id_user", "id_user");
    }

    public function dokter()
    {
        return $this->hasOne("App\Dokter", "id_user", "id_user");
    }

    public function pegawai()
    {
        return $this->hasOne("App\Pegawai", "id_user", "id_user");
    }
}
