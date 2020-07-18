<?php


namespace App\Http\Services;


use App\Models\Area;
use Symfony\Component\HttpFoundation\Request;

class AreaService
{

    public function fill(Request $request, Area $area = null)
    {
        if (!$area) {
            $area = new Area();
        }

        $area->fill($request->request->all());
        $area->active = $request->request->get("active", 0);
        $area->save();

        return $area;
    }

}
