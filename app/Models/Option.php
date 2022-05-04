<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parameter_id'
    ];

    public function parameter()
    {
        return $this->belongsTo(Parameter::class);
    }
}