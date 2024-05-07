<?php

namespace App\Models;

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

    protected $dates = ['date'];

    public function getFormattedDateAttribute()
    {
        if ($this->date instanceof \DateTimeInterface) {
            return $this->date->format('d-m-Y');
        }

        // If not, try converting it to a DateTime object
        try {
            $date = new \DateTime($this->date);
            return $date->format('d-m-Y');
        } catch (\Exception $e) {
            // Handle any errors during conversion
            return 'Invalid Date';
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
