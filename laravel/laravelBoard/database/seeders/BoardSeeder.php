<?php

namespace Database\Seeders;

use App\Models\Board;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $total = 100000;
        // $interval = 5000;
        // $total = 100;
        // $interval = 50;

        // for($j = 0; $j < $total; $j += $interval){
        //     Board::factory($interval)->create();
        // }
        

        // for($i = 0; $i < 60; $i++){
        //     Board::factory(5000)->create();
        // }

        for($i = 0; $i < 60; $i++){
            Board::factory(500)->create();
        }
    }
}
