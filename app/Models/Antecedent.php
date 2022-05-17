<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antecedent extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'illness_id',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function illness()
    {
        return $this->belongsTo(Illness::class);
    }
}