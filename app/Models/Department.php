<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'faculty_id',
        'coordinator',
        'hod'
    ];

    //satu departemen(program studi) hanya dimiliki satu fakultas
    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    //satu departemen(program studi) memiliki banyak user
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
