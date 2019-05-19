<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotificationEs;
use Illuminate\Foundation\Auth\User as Authenticatable; //se coloco esta linea en remplazo de eloquent
//use Illuminate\Database\Eloquent\Model;

class Empleado extends Authenticatable
{
    use Notifiable;	

    protected $table = 'empleado';
    protected $primaryKey = 'id_empleado';
     protected $fillable = ['Nombre','Apellidos','Telefono','email','password','Direccion','remember_token'];
    protected $guard = 'employes';



    // protected $hidden = [
    //     'password', 'remember_token',
    // ];

    

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotificationEs($token));
    }
}
