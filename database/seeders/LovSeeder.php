<?php

namespace Database\Seeders;

use App\Models\Lov;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LovSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lov::firstOrCreate(
            [
                'id' => '1',
                'name' => 'Male',
                'lov_category_id' => '1',
            ]
        );

        Lov::firstOrCreate(
            [
                'id' => '2',
                'name' => 'Female',
                'lov_category_id' => '1',
            ]
        );

        Lov::firstOrCreate(
            [
                'id' => '3',
                'name' => 'Other',
                'lov_category_id' => '1',
            ]
        );
    }
}
