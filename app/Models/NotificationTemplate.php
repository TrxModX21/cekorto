<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationTemplate extends Model
{
    use HasFactory;

    protected $guarder = ['id', 'created_at', 'updated_at'];

    protected $casts = [
        'shortcodes' => 'object'
    ];
}
