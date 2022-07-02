<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAntecedent extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'pharmacological_id'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}