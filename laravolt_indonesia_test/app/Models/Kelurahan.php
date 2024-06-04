<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'district_id',
        'name',
        'meta',
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}