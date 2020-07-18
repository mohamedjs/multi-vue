<?php


namespace App\Http\Repository;


use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class UserRepository
{
    /**
     * @param Request $request
     *
     * @return Builder
     */
    public function search(Request $request)
    {
        $users = User::query();

        if ($request->filled("search_by") && $request->filled("query")) {

            $needLikeOperator = ['first_name' , 'last_name', "phone", 'email'];
            $query = $request->get("query");
            $op = '=';

            if (in_array($request->get("search_by"), $needLikeOperator)) {
                $query = "%" . $query . "%";
                $op = "like";
            }

            $users->where($request->get("search_by"), $op, $query);
        }

        if ($request->filled("active")) {
            $users->where("active", "=", $request->get("active"));
        }

        if ($request->filled("type")) {
            $users->where("type", "=", $request->get("type"));
        }

        if ($request->filled("gender")) {
            $users->where("gender", "=", $request->get("gender"));
        }

        if ($request->filled("area_id")) {
            $users->where("area_id", "=", $request->get("area_id"));
        }

        if ($request->has("from") && $request->from != '') {
            $users->whereDate("created_at", ">=", $request->from);
        }

        if ($request->has("to") && $request->to != '') {
            $users->whereDate("created_at", "<=", $request->to);
        }

        if ($request->has("email") && $request->email != '') {
            $users->where("email", "=", $request->email);
        }

        return $users;
    }
}
