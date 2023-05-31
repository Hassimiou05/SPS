<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipement extends Model
{
    protected $fillable = [
        'type_id',
        'modele',
        'description',
        'fournisseur_id',
        'quantite',
    ];
    use HasFactory;
}
