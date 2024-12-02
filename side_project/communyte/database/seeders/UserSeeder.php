<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['account' => 'descarl', 'password' => Hash::make('qwer1234'), 'name' => 'nia', 'admin' => '1', 'gender' => '0', 'profile' => '/profile/SE-90811781-377a-445d-b1fb-e1f8adbce8ee.jpg'],
            ['account' => 'qwer1234', 'password' => Hash::make('qwer1234'), 'name' => 'nikonikoni', 'admin' => '0', 'gender' => '0', 'profile' => '/profile/nikonikoni.png'],
        ];
        foreach($data as $item) {
            User::create($item);
        }
    }
}
