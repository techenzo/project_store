<?php

namespace App\Acme;

use Illuminate\Database\Eloquent\Model;

class ColorImage extends Model
{
    public function color()
    {
        return $this->belongsTo(Color::class);
    }

   
}
