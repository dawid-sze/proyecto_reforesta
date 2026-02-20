<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventos extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'eventos';
    protected $fillable = ['nombre','tipo_evento','tipo_terreno','ubicacion','fecha','descripcion','imagen','pdf','anfitrion_id'];

    public function participantes(){
        return $this->belongsToMany(Usuarios::class, 'usuarios_eventos');
    }

    public function anfitrion(){
        return $this->belongsTo(Usuarios::class);
    }

    public function especies(){
        return $this->belongsToMany(Especies::class, 'eventos_especies');
    }
}
