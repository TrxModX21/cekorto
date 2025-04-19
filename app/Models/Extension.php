<?php

namespace App\Models;

use App\Traits\GlobalStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extension extends Model
{
    use GlobalStatus, HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = [
        'shortcode' => 'object',
    ];

    protected $hidden = ['script', 'shortcode'];

    public function scopeGenerateScript()
    {
        $script = $this->script;
        foreach ($this->shortcode as $key => $item) {
            $script = str_replace('{{' . $key . '}}', $item->value, $script);
        }
        return $script;
    }
}
