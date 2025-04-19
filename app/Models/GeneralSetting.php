<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'mail_config' => 'object',
        'sms_config' => 'object',
        'global_shortcodes' => 'object',
        'socialite_credentials' => 'object',
        'firebase_config' => 'object',
        'instruction' => 'object',
        'ftp' => 'object',
        'wasabi' => 'object',
        'digital_ocean' => 'object',
        'vultr' => 'object',
        'donation_setting' => 'object'
    ];

    protected $hidden = ['email_template', 'mail_config', 'sms_config'];

    public function scopeSiteName($query, $pageTitle)
    {
        $pageTitle = empty($pageTitle) ? '' : "- {$pageTitle}";
        return "{$this->site_name} {$pageTitle}"; // Site Name - Page Title
    }

    protected static function boot()
    {
        parent::boot();
        static::saved(function () {
            \Cache::forget('GeneralSetting');
        });
    }
}
