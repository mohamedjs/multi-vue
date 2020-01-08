<?php
/**
 * Created by PhpStorm.
 * Coupon: ghost
 * Date: 6/1/19
 * Time: 12:58 AM
 */

namespace App\Http\Services;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponServices
{

    public function fillCouponFromRequest(Request $request, Coupon $coupon = null)
    {
        if (!$coupon) {
            $coupon = new Coupon();
        }
        for ($i=0; $i < $request->number; $i++) {
            Coupon::create([
                'coupon' => substr(str_replace(['+', '/', '='], '', base64_encode(random_bytes(32))), 0, 10) ,
                'value' => $request->value,
                'expire_date' => $request->expire_date
            ]);
        }

        return $coupon;
    }
}
