<?php
/**
 * Created by PhpStorm.
 * City: ghost
 * Date: 6/1/19
 * Time: 12:58 AM
 */

namespace App\Http\Services;

use App\City;
use Illuminate\Http\Request;

class CityServices
{

    public function fillCityFromRequest(Request $request, City $city = null)
    {
        if (!$city) {
            $city = new City();
        }

        $city->fill($request->all());
        $city->save();

        return $city;
    }
}
