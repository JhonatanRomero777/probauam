<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'question_id',
        'score',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function choices()
    {
        return $this->hasMany(Choice::class);
    }
}