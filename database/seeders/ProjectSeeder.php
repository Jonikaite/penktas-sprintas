<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p1 = new \App\Models\Project();
        $p1->title = "New marketing campaign";
        $p1->save();

        $p2 = new \App\Models\Project();
        $p2->title = "Employees interview";
        $p2->save();
    }
}