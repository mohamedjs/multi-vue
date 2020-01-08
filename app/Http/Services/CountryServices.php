<?php
/**
 * Created by PhpStorm.
 * Country: ghost
 * Date: 6/1/19
 * Time: 12:58 AM
 */

namespace App\Http\Services;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryServices
{

    public function fillCountryFromRequest(Request $request, Country $country = null)
    {
        if (!$country) {
            $country = new Country();
        }

        $country->fill($request->all());
        $country->save();

        return $country;
    }
}
