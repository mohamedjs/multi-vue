<?php

namespace App\Http\Controllers\Admin;

use App\Constants\UserTypes;
use App\Models\Demand;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DemandAssigneeController extends Controller
{
    public function create(Request $request, Demand $demand)
    {
        $admins = User::query()
            ->where("type", "=", UserTypes::ADMIN)
            ->whereDoesntHave("manageDemands", function ($query) use ($demand) {
                $query->where("demand_id", "=", $demand->id);
            });

        if (
            !Auth::user()->hasAccess("admin.demands.assignees.create") and
            Auth::user()->hasAccess("admin.demands.assignees.himself")
        ) {
                $admins->where("id", "=", Auth::id());
        }
            $admins = $admins->get();

        return view("admin.demands.assignees.create", compact("admins", "demand"));
    }

    public function store(Request $request, Demand $demand)
    {
        $this->validate($request, ['user_id' => "required"]);

        if (!Auth::user()->hasAccess("admin.demands.assignees.create") && $request->get("user_id") != Auth::id()) {
            abort(403);
        }

            $demand->managers()->attach(["user_id" => $request->user_id]);

        return back()->with("success", "the Admin is assigned to the request");
    }

    public function destroy(Demand $demand, User $assignee)
    {
        if(
            !(auth()->user()->hasAccess("admin.demands.assignees.create") or
            ( auth()->user()->hasAccess("admin.demands.assignees.himself") and auth()->id() == $assignee->id))
        ) {
            abort(403);
        }
        $demand->managers()->detach($assignee);

        return back()->with("success", "this Admin removed from Request Manager List");
    }
}
