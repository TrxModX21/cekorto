<?php

namespace App\Models;

use App\Traits\GlobalStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    use GlobalStatus, HasFactory;

    public function diseases()
    {
        return $this->belongsToMany(Disease::class, 'disease_symptom')
            ->withPivot('weight');
    }

    public function diagnoses()
    {
        return $this->belongsToMany(Diagnose::class, 'diagnosis_symptoms');
    }
}
