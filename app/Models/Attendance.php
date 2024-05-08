<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date',
        'time_in',
        'time_out',
        'latlon_in',
        'latlon_out',
    ];

    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->translatedFormat('d F Y');
    }

    public function getTimeInAttribute($value)
    {
        return Carbon::parse($value)->format('H:i');
    }

    public function getTimeOutAttribute($value)
    {
        return Carbon::parse($value)->format('H:i');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
