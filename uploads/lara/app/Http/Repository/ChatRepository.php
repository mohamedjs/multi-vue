<?php


namespace App\Http\Repository;


use App\Models\Chat;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ChatRepository
{
    /**
     * @param Request $request
     * @return Builder
     */
    public function search(Request $request)
    {
        $chats = Chat::query();

        if ($request->filled("demand_id")) {
            $chats->where("demand_id", "=", $request->get("demand_id"));
        }

        return $chats;
    }
}
