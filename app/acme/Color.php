<?php

namespace App\Acme;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public function colorimage()
    {
        return $this->hasMany(ColorImage::class);
    }

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }

  
}
