<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'city_id',
        'name',
        'meta',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}