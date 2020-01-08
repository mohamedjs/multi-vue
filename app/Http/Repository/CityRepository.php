<?php
namespace App\Http\Repository;

use App\Models\City;
use Illuminate\Http\Request;

class CityRepository
{
    public function CityWithFiltration(Request $request)
    {
      $per_page  = 10;
      $citys = City::with('state');
      if($request->has('per_page')){
        $per_page = $request->per_page;
      }
      if($request->has('state_id')){
          $citys = $citys->where('state_id',$request->state_id);
      }
      if($request->has('search') && $request->search != ''){
        $citys = $citys->whereLike(['name', 'shipping_amount' , 'state_id'],$request->search);
      }
      $citys = $citys->latest('cities.created_at')->Paginate($per_page);
      $citys->appends($request->all());
      return $citys;
    }
}
