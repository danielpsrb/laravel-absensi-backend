<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date_permission',
        'reason',
        'image',
        'status',
    ];

    public function getDatePermissionAttribute($value)
    {
        return Carbon::parse($value)->translatedFormat('d F Y');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
