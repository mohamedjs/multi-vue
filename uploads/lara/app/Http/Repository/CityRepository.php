<?php


namespace App\Http\Repository;


use App\Models\City;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CityRepository
{
    /**
     * @param Request $request
     *
     * @return Builder
     */
    public function search(Request $request)
    {
        $cities = City::query();

        return $cities;
    }
}
