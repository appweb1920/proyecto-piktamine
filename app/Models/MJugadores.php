<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MJugadores extends Model
{
    use HasFactory;
    
    public $table = 'm_jugadores';
    
    protected $fillable = ['idTorneo','Nombre','Tag','Sponsor'];
}
