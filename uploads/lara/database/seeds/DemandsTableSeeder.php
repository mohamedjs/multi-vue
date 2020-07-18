<?php

use App\Models\Demand;
use Illuminate\Database\Seeder;

class DemandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Demand::class, 100)->create();
    }
}
