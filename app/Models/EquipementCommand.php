<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipementCommand extends Model
{
    protected $fillable = [
        'commande_id',
        'equipment_id',
        'quantite',
    ];
    use HasFactory;
}
