<?php

namespace Database\Seeders;

use App\Models\LovCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LovCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LovCategory::create(
            [
                'id' => '1',
                'name' => 'Gender',
                'remarks' => 'Male,Female',
            ]
        );
    }
}
