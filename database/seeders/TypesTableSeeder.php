<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project_types = ['front-end','back-end','fullstack','wordpress','html-only','data-managment'];

        foreach ($project_types as $type) {
            $new_type = new Type();

            $new_type->name = $type;
            $new_type->slug = Str::slug($type , '-');

            $new_type->save();
        }
    }
}
