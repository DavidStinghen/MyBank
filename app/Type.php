<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['name'];

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }
}
