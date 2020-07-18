<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call(CitiesTableSeeder::class);
       $this->call(AreasTableSeeder::class);
       $this->call(UsersTableSeeder::class);
       $this->call(CategoriesTableSeeder::class);
       $this->call(ProvidersTableSeeder::class);
       $this->call(DemandsTableSeeder::class);
       $this->call(ContactUsTableSeeder::class);
       $this->call(ChatSeeder::class);
       $this->call(RolesSeeder::class);
       $this->call(RolePermissionsSeeder::class);
       $this->call(UserRolesSeeder::class);
       $this->call(PaymentSeeder::class);
       $this->call(CategoryProvidersSeeder::class);
    }
}
