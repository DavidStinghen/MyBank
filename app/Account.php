<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['saldo'];

    public function users()
    {
        return $this->belongdTo(User::class);
    }

    public function flows()
    {
        return $this->hasMany(Flow::class);
    }
}
