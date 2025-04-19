<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiseaseRecommendation extends Model
{
    public function disease()
    {
        return $this->belongsTo(Disease::class);
    }

    public function recommendation()
    {
        return $this->belongsTo(Recommendation::class);
    }
}
