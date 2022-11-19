<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private $packages = [
        [
            'id' => 1,
            'name' => 'Basic',
            'active_period' => 1,
            'price' => 50000
        ],
        [
            'id' => 2,
            'name' => 'Middle',
            'active_period' => 3,
            'price' => 130000
        ],
        [
            'id' => 3,
            'name' => 'Advance',
            'active_period' => 6,
            'price' => 250000
        ],
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packages')->insert($this->packages);
    }
}
