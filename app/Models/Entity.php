<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'direction',
        'nit',
        'phone',
        'country',
        'city_id'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
}