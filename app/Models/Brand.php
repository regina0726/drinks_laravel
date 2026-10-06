<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'alcohol_percent',
        'drinktype_id',
    ];

    protected $casts = [
        'alcohol_percent' => 'float',
    ];

    public function drinktype()
    {
        return $this->belongsTo(DrinkType::class, 'drinktype_id');
    }
}
