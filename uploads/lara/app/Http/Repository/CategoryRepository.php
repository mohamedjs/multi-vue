<?php

namespace App\Http\Repository;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryRepository
{
    public function search(Request $request)
    {
        $categories = Category::query();

        if ($request->filled("search_by") && $request->filled("query")) {
            $needLikeOperator = ['name'];
            $query = $request->get("query");
            $op = '=';
            if (in_array($request->get("search_by"), $needLikeOperator)) {
                $query = "%" . $query . "%";
                $op = "like";
            }

            $categories->where($request->get("search_by"), $op, $query);
        }

        if ($request->filled("active")) {
            $categories->where("active", "=", $request->get("active"));
        }
        
        return $categories;
    }
}
