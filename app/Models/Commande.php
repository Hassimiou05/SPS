<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable = [
        'fournisseur_id',
        'date_commande',
        'livrer',
    ];
    use HasFactory;
    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }
}
