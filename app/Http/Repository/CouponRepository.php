<?php
namespace App\Http\Repository;

use App\Coupon;
use Illuminate\Http\Request;

class CouponRepository
{
    public function CouponWithFiltration(Request $request)
    {
      $per_page  = 10;
      $coupons = Coupon::latest('coupons.created_at');
      if($request->has('per_page')){
        $per_page = $request->per_page;
      }
      if($request->has('search') && $request->search != ''){
        $coupons = $coupons->whereLike(['coupon' ,'value' , 'expire_date' , 'client_id' , 'used'],$request->search);
      }
      $coupons = $coupons->Paginate($per_page);
      $coupons->appends($request->all());
      return $coupons;
    }
}
