<?php

namespace App\Acme;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    public function colorimage()
    {
        return $this->hasManyThrough(
            ColorImage::class, 
            Color::class,
            'inventory_id', // Foreign key on color table...
            'color_id', // Foreign key on colorimage table...
            'id', // Local key on inventories table...
            'id' // Local key on color table...
        );
    }

    public function color()
    {
        return $this->hasMany(
            Color::class
        );
    }

   

}
