<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $type_ids = Type::all()->pluck('id')->all();

        $technology_ids = Technology::all()->pluck('id')->all();

        for ($i = 0; $i < 50; $i++) {

            $project = new Project();

            $project->title = $faker->unique()->sentence($faker->numberBetween(3, 5));
            $project->slug = Str::slug($project->title, '-');
            $project->client = $faker->name($faker->numberBetween(2, 3));
            $project->url = $faker->url();
            $project->description = $faker->optional()->text(500);
            $project->type_id = $faker->optional()->randomElement($type_ids);

            $project->save();

            $project->technologies()->attach($faker->randomElements($technology_ids, rand(0, 3)));

        }
    }
}
