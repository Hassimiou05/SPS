<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sites extends Model
{
    protected $fillable = [
        'contrat_id',
        'ville',
        'quartier',
        'flotte',
        'agents_id',
    ];
    protected $cast = [
        'agents_id' => 'array'
    ];
    protected $primaryKey = 'id';
    use HasFactory;

    public function agents()
    {
        return $this->belongsToMany(Agents::class);
    }

    public function setCatAttribute($value)
    {
        $this->attributes['agents_id'] = json_encode($value);
    }

    /**
     * Get the categories
     *
     */
    public function getCatAttribute($value)
    {
        return $this->attributes['agents_id'] = json_decode($value);
    }
}
