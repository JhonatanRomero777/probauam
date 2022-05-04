<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'names',
        'last_names',
        'document_type',
        'document',
        'birthday',
        'sex',
        'height',
        'weight',
        'size',
        'phone',
        'direction',
        'civil_status',
        'education_level',
        'socioeconomic_stratum',
        'social_security_scheme',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sesions()
    {
        return $this->hasMany(Sesion::class);
    }
}