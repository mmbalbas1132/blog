<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Curso extends Model
{
    use HasFactory;

    // Añado $fillable y el array con las propiedades que se van apoder modificar al crear o modificar los cursos. Si son pocas las propiedades puedo escribirlas, pero si son muchas será mejor que use $guarded definiendo el arrray de las propiedades que quiero proteger, en este caso el status o un array vacío. Así ahorro escribir todas las proiedades del objeto.
    // protected $fillable = ['nombre', 'descripcion', 'categoria'];

    
    protected $guarded = [];

    // La función siguiente la creo y hace que Laravel busque el curso por el campo que elijo en vez del Id (predeterminado) para generar urls amigables.
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
