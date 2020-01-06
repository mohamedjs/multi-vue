<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use App\Coupon;
use App\Http\Requests\Api\CouponRequest;
use App\Http\Repository\CouponRepository;
use App\Http\Services\CouponServices;

class CouponController extends Controller
{
  /**
   * @var couponServices
   */
  private $couponServices;
  /**
   * @var couponRepository
   */
  private $couponRepository;

  public function __construct(CouponRepository $couponRepository ,CouponServices $couponServices)
  {
      $this->couponRepository = $couponRepository  ;
      $this->couponServices   = $couponServices    ;
  }

  public function index(Request $request)
  {
    $coupons = $this->couponRepository->CouponWithFiltration(request());
    $data['coupons'] = $coupons;
    return response()->json(['status' => 'success' , 'data' => $data , 'message' => 'Get All Coupon']);
  }

  public function store(CouponRequest $request)
  {
    $coupon = $this->couponServices->fillCouponFromRequest($request);
    return response()->json(['data' => $coupon , 'status' => 'success' , 'message' => 'Coupon Added Successfully']);
  }

  public function edit($id)
  {
    $coupon = Coupon::with('country')->where('coupons.id',$id)->first();
    return response()->json(['status' => 'success' , 'data' => $coupon , 'message' => 'Get Coupon For Edit Success']);
  }

  public function update(CouponRequest $request,Coupon $coupon)
  {
    $coupon = $this->couponServices->fillCouponFromRequest($request,$coupon);
    return response()->json(['status' => 'success' , 'data' => $coupon , 'message' => 'Update Coupon SuccessFully']);
  }

  public function destroy($id)
  {
    $coupon = Coupon::find($id)->delete();
    return response()->json(['status' => 'success' , 'data' => (object)[] , 'message' => 'Delete Coupon SuccessFully']);
  }
}
