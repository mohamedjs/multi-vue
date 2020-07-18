<?php


namespace App\Http\Repository;


use App\Models\Issue;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class IssueRepository
{
    /**
     * @param Request $request
     * @return Builder
     */
    public function search(Request $request)
    {
        $issues = Issue::query()->orderByDesc('id');

        if ($request->filled('user_id')) {
            $issues->where("user_id", "=", $request->get('user_id'));
        }

        if ($request->filled('type')) {
            $issues->where('type', "=", $request->get('type'));
        }

        if ($request->filled('category_id')) {
            $issues->where("category_id", "=", $request->get("category_id"));
        }

        if ($request->filled("area_id"))
        {
            $issues->where("area_id", "=", $request->get("area_id"));
        }

        if ($request->filled("city_id")) {
            $issues->whereHas('area', function ($query) use ($request) {
                $query->where('city_id', "=", $request->get('city_id'));
            });
        }

        return $issues;
    }
}
