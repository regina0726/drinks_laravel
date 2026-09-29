<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DrinkType;

class DrinkTypeSeeder extends Seeder
{
    const DRINKTYPES = [
        'Rövid italok',
        'Sörök és ciderek',
        'Borok',
        'Koktélok',
    ];

    public function run(): void
    {
        foreach (self::DRINKTYPES as $name) {
            DrinkType::create([
                'name' => $name,
            ]);
        }
    }
}
