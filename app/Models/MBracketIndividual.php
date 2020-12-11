<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MBracketIndividual extends Model
{
    use HasFactory;
    public $table = 'm_bracket_individuals';
    
    protected $fillable = ['idTorneo','idOp1','idOp1','Res1','Res2','nRonda','Capacidad'];
}
