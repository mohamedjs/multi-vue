<?php


namespace App\Http\Repository;


use App\Models\Area;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class AreaRepository
{
    /**
     * @param Request $request
     * @return Builder
     */
    public function search(Request $request)
    {
        $areas = Area::query();

        if ($request->filled('city_id')) {
            $areas->where('city_id', '=', $request->get('city_id'));
        }

        return $areas;
    }
}
