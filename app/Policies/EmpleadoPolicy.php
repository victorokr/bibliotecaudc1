<?php

namespace App\Policies;

use App\Empleado;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmpleadoPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function before($user, $ability)//este metodo se ejecuta primero que los demas, y autoriza al administador para que pueda editar a los empleados, teniendo en cuenta que el id de el administrador es diferente a los demas id de empleados y por esto se ejecuta la politica,( la politica solo autoriza id,s iguales, para que un empleado solo edite su informacion) impidiendo que el administrador pueda editar otros usuarios.
    {
        if($user->hasRoles(['Administrador'])){
            return true;
        }
    }



    public function edit(Empleado $empleado, Empleado $listaempleados)
    {
        return ($empleado->id_empleado === $listaempleados->id_empleado);
    }




    public function update(Empleado $authUser, Empleado $listaempleados)
    {
        return ($authUser->id_empleado === $listaempleados->id_empleado);
    }



    public function destroy(Empleado $authUser, Empleado $listaempleados)
    {
        return ($authUser->id_empleado === $listaempleados->id_empleado);
    }
}
