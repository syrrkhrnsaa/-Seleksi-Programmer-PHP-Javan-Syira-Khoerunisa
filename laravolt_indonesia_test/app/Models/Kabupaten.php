<?php

namespace App\Models;

class Kabupaten extends City
{
    public function provinsi()
    {
        return $this->province();
    }

    public function getAddressAttribute()
    {
        $this->load('provinsi');

        return sprintf(
            '%s, %s, Indonesia',
            $this->name,
            optional($this->provinsi)->name
        );
    }
}