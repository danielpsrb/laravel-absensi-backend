<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'dean',
    ];

    // satu fakultas memiliki banyak departemen(program studi)
    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    // satu fakultas memiliki banyak user
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
