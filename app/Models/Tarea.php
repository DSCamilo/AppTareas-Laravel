<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

     // Agrega esta línea dentro de la clase para permitir asignación masiva
     protected $fillable = ['title'];
}
