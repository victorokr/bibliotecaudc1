<?php

namespace App;

use Illuminate\Notifications\Notifiable;
//use Illuminate\Support\Facades\Hash;
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


     public function setPasswordAttribute($password)//modifica el password encriptandolo
    {
        $this->attributes['password']=bcrypt($password);
    }




    public function roles()
    {
        return $this->belongsToMany('App\Role','empleado_role','id_empleado','id_role');//el primero pertenece a la tabla pivot, 2do a la tabla empleado para evitar que eloquen lo busque en orden alfabetico, 3ro el id de la tabla a relacionar, tabla role.
    }




    public function contrato()//este metodo define la relacion de uno a muchos. Trae los datos de la tabla contrato
    {
        return $this->hasMany('App\Contrato','id_contrato');
    }




    public function hasRoles(array $roles)
    {
        foreach ($roles as $role)
         {
             foreach ($this->roles as $empleadoRol)//$this->role hace referencia al campo rol en la abase de datos
             {

                if ($empleadoRol->Nombre === $role)
                {
                    return true;
                }


             }
            
         }



        return false;
    }


    public function scopeEmpleado($query, $nombreEmpleado)
    {
        if($nombreEmpleado)
        return $query->where('Nombre','LIKE',"%$nombreEmpleado%");
    }

}
