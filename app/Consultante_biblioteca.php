<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable; //se llamo para poder reestablecer la contraseña
use App\Notifications\ConsultanteResetPasswordNotification;//se llamo para poder reestablecer la contraseña

class Consultante_biblioteca extends Authenticatable
{
	use Notifiable; //se llamo el trait para poder reestablecer la contraseña
    protected $table ='consultante_biblioteca';
    protected $primaryKey ='id_consultanteBiblioteca';
    protected $fillable = ['Nombre','Apellidos','Documento','Telefono','Direccion','email','password','lugarDeResidencia','id_institucionUniversidad','id_facultad','id_tipoDeConsultante'];
    protected $guard = 'consultants';



    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ConsultanteResetPasswordNotification($token));
    }


     public function hasRoles(array $roles)
    {
        foreach ($roles as $role)
         {
             foreach ($this->roles as $consultanteRol)//$this->role hace referencia al campo rol en la abase de datos
             {

                if ($consultanteRol->Nombre === $role)
                {
                    return true;
                }


             }
            
         }



        return false;
    }

        public function roles()
        {
        return $this->belongsToMany('App\Role','role_consultantebiblioteca','id_consultanteBiblioteca','id_role');//el primero pertenece a la tabla pivot, 2do a la tabla empleado para evitar que eloquen lo busque en orden alfabetico, 3ro el id de la tabla a relacionar, tabla role.
        }

    public function setPasswordAttribute($password)//modifica el password encriptandolo
    {
        $this->attributes['password']=bcrypt($password);
    }


    public function institucionUniversidadd()//este metodo define la relacion de uno a muchos. Trae los datos de la tabla institucion universidad
    {
        return $this->belongsTo('App\Institucion_universidad','id_institucionUniversidad');
    }

    public function facultadd()//este metodo define la relacion de uno a muchos. Trae los datos de la tabla institucion universidad
    {
        return $this->belongsTo('App\Facultad','id_facultad');
    }

    public function tipoDeConsultante()//este metodo define la relacion de uno a muchos. Trae los datos de la tabla institucion universidad
    {
        return $this->belongsTo('App\Tipo_de_consultante','id_tipoDeConsultante');
    }

    public function perfiles()
    {
        return $this->belongsToMany('App\Perfil','consultantebiblioteca_perfil','id_consultanteBiblioteca','id_perfil');//el primero pertenece a la tabla pivot, 2do a la tabla perfil para evitar que eloquen lo busque en orden alfabetico, 3ro el id de la tabla a relacionar, tabla consultante_biblioteca.
    }


    public function scopeDocumento($query, $documentoConsultante)
    {
        if($documentoConsultante)
        return $query->where('Documento','LIKE',"%$documentoConsultante%");
    }

}
