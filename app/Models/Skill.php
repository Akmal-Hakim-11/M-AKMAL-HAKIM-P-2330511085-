<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $table = 'skills';

    protected $fillable = [
        'biodata_id',
        'name',
        'proficiency',
        'display_order',
    ];

    protected $casts = [
        'proficiency' => 'integer',
        'display_order' => 'integer',
    ];

    public function biodata()
    {
        return $this->belongsTo(Biodata::class);
    }
}
