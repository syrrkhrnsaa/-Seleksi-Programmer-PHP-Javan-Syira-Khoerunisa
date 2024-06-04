<?php

namespace App\Models;

class Kecamatan extends District
{
    public function kabupaten()
    {
        return $this->city();
    }

    public function getAddressAttribute()
    {
        $this->load('kabupaten.province');

        return sprintf(
            '%s, %s, %s, Indonesia',
            $this->name,
            optional($this->kabupaten)->name,
            optional($this->kabupaten->province)->name
        );
    }
}