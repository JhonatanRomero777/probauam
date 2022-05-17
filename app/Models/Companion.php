<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companion extends Model
{
    use HasFactory;

    protected $fillable = [
        'relationship',
        'names',
        'last_names',
        'phone',
        'cellphone',
        'direction',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}