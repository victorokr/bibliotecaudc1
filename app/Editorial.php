<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{
    protected $table = 'editorial';
    protected $primaryKey = 'id_editorial';
    protected $fillable = ['Editorial'];


    public function materialbiblioteca()//este metodo define la relacion de uno a muchos. Trae los datos de la tabla materialbiblioteca
    {
        return $this->hasMany('App\Materialbiblioteca','id_materialBiblioteca');
    }


    public function scopeEditorial($query, $nombreEditorial)
    {
        if($nombreEditorial)
        return $query->where('Editorial','LIKE',"%$nombreEditorial%");
    }
}
