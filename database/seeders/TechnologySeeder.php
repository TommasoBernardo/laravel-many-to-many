<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $technologies = ['Front-end', 'Back-end', 'Full-stack'];

        foreach ($technologies as $technologyName) {
            $technology = new Technology();
            $technology->name = $technologyName;
            $technology->accent_color = $faker->unique()->hexColor();
            $technology->bg_color = $faker->unique()->hexColor();
            $technology->slug = str::slug($technologyName);
            $technology->save();
            $technology->slug = $technology->slug . "-$technology->id";
            $technology->update();
        }
    }
}
