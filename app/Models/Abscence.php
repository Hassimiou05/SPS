<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abscence extends Model
{
    //protected $table = 'absence_agent';
    use HasFactory;
    protected $fillable = [
        'agent_id',
        'periode',
        'nbre_jour',
    ];
    public function agents()
    {
        return $this->belongsToMany(Agents::class)->withPivot('nbre_jour');
    }
}
