<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frontend extends Model
{
    use HasFactory;

    protected $guarder = ['id', 'created_at', 'updated_at'];

    protected $casts = [
        'data_values' => 'object',
        'seo_content' => 'object'
    ];

    public static function scopeGetContent($data_keys)
    {
        return Frontend::where('data_keys', $data_keys);
    }
}
