<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especies extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'especies';
    protected $fillable = ['nombre','clima','region','imagen','beneficios','descripcion','tiempo_crecimiento'];

    public function eventos(){
        return $this->belongsToMany(Eventos::class, 'eventos_especies');
    }
}
