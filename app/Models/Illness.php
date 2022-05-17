<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Illness extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
    ];

    public function antecedents()
    {
        return $this->hasMany(Antecedent::class);
    }
}