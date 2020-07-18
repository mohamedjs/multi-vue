<?php


namespace App\Http\Repository;


use App\Models\ContactUs;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ContactUsRepository
{
    /**
     * @param Request $request
     *
     * @return Builder
     */
    public function search(Request $request)
    {
        $contacts = ContactUs::query();

        if ($request->filled("search_by") && $request->filled("query")) {
            $needLikeOperator = ["phone","email","id"];
            $query = $request->get("query");
            $op = '=';
            if (in_array($request->get("search_by"), $needLikeOperator)) {
                $query = "%" . $query . "%";
                $op = "like";
            }

            $contacts->where($request->get("search_by"), $op, $query);
        }

        return $contacts;
    }
}
