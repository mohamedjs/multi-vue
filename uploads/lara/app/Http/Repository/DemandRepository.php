<?php


namespace App\Http\Repository;


use App\Models\Demand;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class DemandRepository
{
    /**
     * @param Request $request
     * @return Builder
     */
    public function search(Request $request)
    {
        $demands = Demand::query();

        if ($request->filled("search_by") && $request->filled("query")) {

            $needLikeOperator = ['name' , 'email', 'id'];
            $query = $request->get("query");
            $op = '=';

            if (in_array($request->get("search_by"), $needLikeOperator)) {
                $query = "%" . $query . "%";
                $op = "like";
            }

            $demands->where($request->get("search_by"), $op, $query);
        }

        if ($request->filled("user_id")) {
            $demands->where("user_id", "=", $request->query->get("user_id"));
        }

        if ($request->filled("admin_id")) {
            $demands->whereHas('managers',function($q) use ($request) {
              $q->where('user_id',$request->admin_id);
            });
        }

        if ($request->filled("provider_id")) {
            $demands->where("provider_id", "=", $request->query->get("provider_id"));
        }

        if ($request->filled("status")) {
            $demands->where("status", "=", $request->query->get("status"));
        }

        if ($request->has("from") && $request->from != '') {
            $demands->whereDate("created_at", ">=", $request->from);
        }

        if ($request->has("to") && $request->to != '') {
            $demands->whereDate("created_at", "<=", $request->to);
        }

        return $demands;
    }
}
