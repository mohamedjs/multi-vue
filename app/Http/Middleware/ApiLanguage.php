<?php

// app/Http/Middleware/Language.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App;
use Illuminate\Support\Facades\Config;
use Session;

class ApiLanguage
{
    public function handle($request, Closure $next)
    {
      // Check header request and determine localizaton
      $local = ($request->hasHeader('X-localization')) ? $request->header('X-localization') : 'en';
      // set laravel localization
      app()->setLocale($local);
      // continue request
      return $next($request);
    }
}
