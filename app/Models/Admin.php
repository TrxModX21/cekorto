<?php

namespace App\Models;

use App\Constants\Status;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function scopeBanned($query)
    {
        return $query->where('status', Status::USER_BAN);
    }

    public function statusBadge(): Attribute
    {
        return new Attribute(
            get: fn() => $this->badgeData(),
        );
    }

    public function badgeData()
    {
        $html = '';
        if ($this->status == 1) {
            $html = '<span><span class="badge badge--success">' . trans('Active') . '</span>';
        } else {
            $html = '<span><span class="badge badge--danger">' . trans('Banned') . '</span>';
        }

        return $html;
    }
}
