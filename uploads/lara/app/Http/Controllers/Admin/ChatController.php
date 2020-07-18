<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repository\ChatRepository;
use App\Http\Repository\ProviderRepository;
use App\Http\Requests\Admin\ChatRequest;
use App\Http\Services\ChatService;
use App\Models\Chat;
use App\Models\Demand;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * @var ChatRepository
     */
    private $chatRepository;
    /**
     * @var ChatService
     */
    private $chatService;
    /**
     * @var ProviderRepository
     */
    private $providerRepository;

    /**
     * ChatController constructor.
     * @param ChatRepository $chatRepository
     * @param ChatService $chatService
     * @param ProviderRepository $providerRepository
     */
    public function __construct(ChatRepository $chatRepository, ChatService $chatService, ProviderRepository $providerRepository)
    {
        $this->chatRepository = $chatRepository;
        $this->chatService = $chatService;
        $this->providerRepository = $providerRepository;
    }

    public function index(Request $request)
    {

        $isRequestManager = auth()->user()->manageDemands()
            ->where("demand_id", "=", $request->get("demand_id"))
            ->first();

        if (!$isRequestManager) {
            abort(403, "You are not a manager for this request");
        }

        $list = $this->chatRepository->search($request)
                ->with(['user','demand'])
                ->get();

        $demand = Demand::query()->find($request->get("demand_id"));

        $user = User::find($request->user_id);

        if($request->ajax()){
          return $list;
        }

        $providers = $this->providerRepository->search($request)
            ->orderByDesc("id")->get();

        return view("admin.chats.index", compact("list","user", "demand", "providers"));
    }


    public function store(ChatRequest $request)
    {
        $chat = $this->chatService->fill($request);

        // $message = $chat->user->first_name . " " . $chat->user->last_name ." Send Message To You, Please Check It";
        $message = $chat->user->first_name . " " . $chat->user->last_name ." لقد ارسل اليك رساله ";
        notification((array) $chat->demand->user_id, $message , null ,'mobile',1,$chat->demand->id);

        if($request->ajax()){
          return Chat::whereId($chat->id)->with(['user','demand'])->first();
        }
        return redirect()->route("admin.chats.index")->with("success", "Item Added Successfully");
    }

}
