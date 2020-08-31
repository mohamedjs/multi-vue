<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Builder;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      Schema::defaultStringLength(191);

      Builder::macro('whereLike', function($attributes, string $searchTerm) {
          $this->where(function($q) use ($attributes,$searchTerm){
            foreach($attributes as $attribute) {
              $q->orWhere($attribute, 'LIKE', "%{$searchTerm}%");
            }
          });
         return $this;
      });

      // make your own query file
      if(env('APP_DEBUG')) {
        \DB::listen(function($query){
          \File::append(
            storage_path('logs/query.log'),
            $query->sql . '[' . implode(', ', $query->bindings) . ']' . PHP_EOL
          );
        });
      }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
