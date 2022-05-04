<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function choices()
    {
        return $this->hasMany(Choice::class);
    }
}
