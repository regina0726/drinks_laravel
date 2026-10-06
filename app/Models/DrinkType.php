<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DrinkType extends Model
{
    public $timestamps = false;

    protected $table = 'drinktypes';

    protected $fillable = ['name'];

    public function brands()
    {
        return $this->hasMany(Brand::class, 'drinktype_id');
    }
}
