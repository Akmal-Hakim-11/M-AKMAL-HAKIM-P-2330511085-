<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'educations';

    protected $fillable = [
        'biodata_id',
        'institution',
        'degree',
        'field_of_study',
        'start_year',
        'end_year',
        'description',
    ];

    public function biodata()
    {
        return $this->belongsTo(Biodata::class);
    }
}
