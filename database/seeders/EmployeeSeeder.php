<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $emp1 = new \App\Models\Employee();
        $emp1->name = "Jonas";
        $emp1->project_id = 1;
        $emp1->save();

        $emp2 = new \App\Models\Employee();
        $emp2->name = "Petras";
        $emp2->project_id = 1;
        $emp2->save();
    }
}