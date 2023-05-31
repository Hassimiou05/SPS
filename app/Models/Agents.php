<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agents extends Model
{

    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'type',
        'date_naissance',
        'lieu_naissance',
        'lieu_residence',
        'tel',
        'image',
        'role',
        'poste',

    ];
    public function site()
    {
        return $this->belongsToMany(Sites::class);
    }
    public function absences()
    {
        return $this->belongsToMany(Absence::class)->withPivot('nbre_jour');
    }
}
