<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrats extends Model
{
    use HasFactory;

    protected $fillable = [
        'nbre_agents',
        'date_debut',
        'client_id',
        'status',
    ];
    protected $primaryKey = 'id';

    public function client()
    {
        return $this->belongsTo(Clients::class);
    }
}
