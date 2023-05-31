<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fichedepaie extends Model
{
    use HasFactory;
    protected $fillable = [
        'datedebut', 'datefin', 'abscence_id',
    ];
}
