<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MTorneos extends Model
{
    use HasFactory;
    
    public $table = 'm_torneos';
    
    protected $fillable = ['idEvento','Nombrejuego','Formato'];
}
