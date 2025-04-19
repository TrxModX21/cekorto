<?php

namespace App\Models;

use App\Traits\GlobalStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use GlobalStatus, HasFactory;

    public function symptoms()
    {
        return $this->belongsToMany(Symptom::class, 'disease_symptoms')
            ->withPivot('weight');
    }

    public function recommendations()
    {
        return $this->belongsToMany(Recommendation::class, 'disease_recommendations')
            ->orderBy('priority', 'asc');
    }
}
