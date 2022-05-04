<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesion extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'finish'
    ];

    public function choices()
    {
        return $this->hasMany(Choice::class);
    }

    public function forms()
    {
        $forms = $this->choices()->select('form_id')->distinct()->get();
        if($forms)
        {
            return Form::select('id')->whereIn('id',$forms)->get();
        }

        return null;
             

    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}