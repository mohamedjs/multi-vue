<?php
namespace App\Http\Repository;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryRepository
{
    public function CountryWithFiltration(Request $request)
    {
      $per_page  = 10;
      if($request->has('per_page')){
        $per_page = $request->per_page;
      }
      $countrys = Country::latest('created_at');
      if($request->has('search') && $request->search != ''){
        $countrys = $countrys->whereLike(['name','code','phonecode'],$request->search);
      }
      $countrys = $countrys->Paginate($per_page);
      $countrys->appends($request->all());
      return $countrys;
    }
}
