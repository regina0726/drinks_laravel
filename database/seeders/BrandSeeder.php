<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DrinkType;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $drinktypes = DrinkType::all();

        foreach ($drinktypes as $drinktype) {

            Brand::create([
                'name' => $drinktype->name . ' ital 1',
                'alcohol_percent' => '10%',
                'drinktype_id' => $drinktype->id,
            ]);

            Brand::create([
                'name' => $drinktype->name . ' ital 2',
                'alcohol_percent' => '15%',
                'drinktype_id' => $drinktype->id,
            ]);
        }
    }
}
