<?php

namespace App\Models;

class Provinsi extends Province
{
    public function getAddressAttribute()
    {
        return sprintf(
            '%s, Indonesia',
            $this->name
        );
    }
}