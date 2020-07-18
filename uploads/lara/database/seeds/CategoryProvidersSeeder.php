<?php

use App\Models\CategoryProvider;
use Illuminate\Database\Seeder;

class CategoryProvidersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CategoryProvider::class, 20)->create();
    }
}
