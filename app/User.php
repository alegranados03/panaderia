<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Caffeinated\Shinobi\Traits\ShinobiTrait;

use Illuminate\Auth\Notifications\ResetPassword;
use App\Notifications\ReinicioPasswordEmail;

class User extends Authenticatable
{

    use Notifiable, ShinobiTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'primerNombre','segundoNombre','primerApellido','segundoApellido','username', 'email', 'password','direccion','sexo','tarjeta_credito',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


public function ordenes(){

  return $this->hasMany(Orden::class);
}

public function sendPasswordResetNotification($token){
    $this->notify(new ReinicioPasswordEmail($token));
}

}
