<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DrinkType extends Model
{
    public $timestamps= false;
    protected $fillable = ['name'];
    protected $table = 'drinktypes';

    public function brands()
    {
    return $this->hasMany(Brand::class, 'drinktype_id');
    }
}
