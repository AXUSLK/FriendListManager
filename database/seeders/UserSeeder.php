<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Admin = User::create([
            'id' => '1',
            'first_name' => 'Sarada',
            'last_name' => 'Bhagya',
            'email' => 'sarada@gmail.lk',
            'password' => bcrypt('sarada@123'),
            'email_verified_at' => Carbon::now(),
        ]);
        $user__1 = User::create([
            'id' => '2',
            'first_name' => 'Sachin',
            'last_name' => 'Kavindu',
            'email' => 'sachin@gmail.lk',
            'password' => bcrypt('sachin@123'),
            'email_verified_at' => Carbon::now(),
        ]);

        $user__2 = User::create([
            'id' => '3',
            'first_name' => 'Sandew',
            'last_name' => 'Dullewa',
            'email' => 'sandew@gmail.lk',
            'password' => bcrypt('sandew@123'),
            'email_verified_at' => Carbon::now(),
        ]);

        $user__3 = User::create([
            'id' => '4',
            'first_name' => 'Pasan',
            'last_name' => 'Vithana',
            'email' => 'pasan@gmail.lk',
            'password' => bcrypt('pasan@123'),
            'email_verified_at' => Carbon::now(),
        ]);

        $user__4 = User::create([
            'id' => '5',
            'first_name' => 'Nadun',
            'last_name' => 'Perera',
            'email' => 'nadun@gmail.lk',
            'password' => bcrypt('nadun@123'),
            'email_verified_at' => Carbon::now(),
        ]);

        $Admin->assignRole([1]);
        $user__1->assignRole([2]);
        $user__2->assignRole([2]);
        $user__3->assignRole([2]);
        $user__4->assignRole([2]);
    }
}
