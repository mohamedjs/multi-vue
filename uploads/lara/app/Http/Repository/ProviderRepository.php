<?php

namespace App\Http\Repository;

use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderRepository
{
    public function search(Request $request)
    {
        $providers = Provider::query();

        if ($request->filled("search_by") && $request->filled("query")) {
            $needLikeOperator = ['name','address'];
            $query = $request->get("query");
            $op = '=';
            if (in_array($request->get("search_by"), $needLikeOperator)) {
                $query = "%" . $query . "%";
                $op = "like";
            }

            $providers->where($request->get("search_by"), $op, $query);
        }

        if ($request->filled("active")) {
            $providers->where("active", "=", $request->get("active"));
        }

        if ($request->filled("category_id")) {
            $providers->whereHas('categorys',function($q) use ($request){
              $q->where('category_id',$request->category_id);
            });
        }

        if ($request->filled("area_id")) {
            $providers->where("area_id", "=", $request->get("area_id"));
        }

        return $providers;
    }
}
