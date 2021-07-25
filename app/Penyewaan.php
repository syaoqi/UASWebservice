<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyewaan extends Model
{
    public function mobil()
    {
        return $this->belongsTo('App\Model\Mobil');
    }
}
