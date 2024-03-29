<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companion extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_type',
        'document',
        'names',
        'last_names',
        'phone',
        'phone2',
        'direction',
        'relationship',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}