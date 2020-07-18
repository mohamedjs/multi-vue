<?php

namespace App\Providers;

use App\Constants\Status;
use App\Constants\DemandStatus;
use App\Constants\UserTypes;
use App\Constants\Genders;
use App\Constants\PaymentMethods;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      Builder::macro('whereLike', function($attributes, string $searchTerm) {
          $this->where(function($q) use ($attributes,$searchTerm){
            foreach($attributes as $attribute) {
              $q->orWhere($attribute, 'LIKE', "%{$searchTerm}%");
            }
          });
         return $this;
      });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      View::composer(['*'], function ($view) {
          $view->with('status', Status::class);
          $view->with('demandstatus', DemandStatus::class);
          $view->with('userTypes', UserTypes::class);
          $view->with('paymentMethods', PaymentMethods::class);
          $view->with('genders', Genders::class);
      });
    }
}
