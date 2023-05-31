<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contrats;

class Clients extends Model
{
    use HasFactory;
    protected $primaryKey = 'client_id';

    protected $fillable = [
        'nom',
        'prenom',
        'tel',
        'mail',
        'lieu_residence',


    ];

    public function contrats()
    {
        return $this->hasMany(Contrats::class);
    }
}
