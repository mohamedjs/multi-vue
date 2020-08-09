<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Support\Facades\Log;

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
      // after job don work chekc what you need and fire anoher event to tell user what happend
      \Queue::after(function(JobProcessed $event){
        $obj = unserialize($event->job->payload()['data']['command']);
        dd($obj);
      });

      // if job faild tell user the reson for that
      // \Queue::failling(function (JobFailed $event){
      //   Log::error("error in event ". $event->exception->getMessage());
      // });
    }
}
