<?php
namespace App\Http\Repository;

use App\Advertisement;
use Illuminate\Http\Request;

class AdvertismentRepository
{
    public function AdvertismentWithFiltration(Request $request)
    {
      $per_page  = 10;
      if($request->has('per_page')){
        $per_page = $request->per_page;
      }
      $advertisments = Advertisement::latest('created_at');
      if($request->has('search') && $request->search != ''){
        $advertisments = $advertisments->whereLike(['ads_url'],$request->search);
      }
      $advertisments = $advertisments->Paginate($per_page);
      $advertisments->appends($request->all());
      return $advertisments;
    }
}
