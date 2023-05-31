<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planing extends Model
{
    use HasFactory;
    protected $fillable = [
        'site_id',
        'agent_id',
        'rest_day',
        'shift',
    ];
    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
