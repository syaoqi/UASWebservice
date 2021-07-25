<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{

    protected $table = "mobils";


    public function penyewaan()
    {
        return $this->hasMany('App\Model\Penyewaan');
    }
}
