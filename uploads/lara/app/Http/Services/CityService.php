<?php


namespace App\Http\Services;


use App\Models\City;
use Symfony\Component\HttpFoundation\Request;

class CityService
{

    public function fill(Request $request, City $city = null)
    {
        if (!$city) {
            $city = new City();
        }

        $city->fill($request->request->all());
        $city->active = $request->request->get("active", 0);
        $city->save();

        return $city;
    }

}
