<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    public function flows()
    {
        return $this->hasMany(Flow::class);
    }
}
