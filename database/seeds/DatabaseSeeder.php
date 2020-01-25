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
        $this->call(UsersTableSeeder::class);
        // $this->call(RolesTableSeeder::class);
        // $this->call(UserHasRolesTableSeeder::class);
        // $this->call(PermissionsTableSeeder::class);
        // $this->call(UserHasPermissionsTableSeeder::class);
        // $this->call(RoleHasPermissionsTableSeeder::class);
        // $this->call(ScaffoldinterfacesTableSeeder::class);
        // $this->call(RelationsTableSeeder::class);
        // $this->call(PasswordResetsTableSeeder::class);
        // $this->call(RoutesTableSeeder::class);
        // $this->call(RoleRouteTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(DeleteAllFlagsTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(OperatorsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
        // $this->call(ProductsTableSeeder::class);
        // $this->call(ProductImagesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        //$this->call(ContactsTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(StaticTranslationsTableSeeder::class);
        $this->call(TranslatablesTableSeeder::class);
        $this->call(StaticBodiesTableSeeder::class);
        $this->call(TansBodiesTableSeeder::class);
        //$this->call(FactorySeeder::class);
        //$this->call(MigrationsTableSeeder::class);
        factory(App\User::class,40)->create();
        factory(App\Models\UserAddress::class, 10)->create();
        factory(App\Models\Product::class, 50)->create();
        factory(App\Models\ProductImage::class, 30)->create();
        factory(App\Models\Order::class, 300)->create();
        //factory(App\ClientCarts::class, 20)->create();
        $this->call(AdvertisementsTableSeeder::class);
        $this->call(CouponsTableSeeder::class);
        $this->call(NotificationsTableSeeder::class);
    }
}
