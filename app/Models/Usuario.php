<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table= "usuario";
    protected $fillable = ["correo","contraseña"];
    public $timestamps = false;

}
