<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 40 ; $i++) {

            $new_project = new Project();

            $new_project->project_name = str_replace('.','',$faker->sentence());
            $new_project->url = $faker->domainName();
            $new_project->description = $faker->text();
            $new_project->slug = Project::generateSlug($new_project->project_name);
            $new_project->status = 'In corso';
            $new_project->license = 'MIT';

            $new_project->type_id = Type::inRandomOrder()->first()->id;

            $new_project->save();
        }

    }
}
