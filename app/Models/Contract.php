<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'entity_id',
        'professional_id'
    ];

    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }

    public function professional()
    {
        return $this->belongsTo(Professional::class);
    }
}