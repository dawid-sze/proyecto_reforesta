<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'usuarios';
    protected $fillable = ['nick','nombre','apellidos','password','email','avatar'];

    public function usuariosEventos(){
        return $this->belongsToMany(Eventos::class, "usuarios_eventos");
    }

    public function hospeda(){
        return $this->hasMany(Eventos::class, 'anfitrion_id');
    }
}
