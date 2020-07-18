<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\ChatRequest;
use App\Http\Resources\ChatResource;
use App\Http\Services\ChatService;
use App\Http\Repository\ChatRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\ChatEvent;
class ChatController extends APIController
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
     * ChatController constructor.
     * @param ChatRepository $chatRepository
     * @param ChatService $chatService
     */
    public function __construct(ChatRepository $chatRepository, ChatService $chatService)
    {
        $this->chatRepository = $chatRepository;
        $this->chatService = $chatService;
    }

    public function index(Request $request)
    {
        $list = $list = $this->chatRepository->search($request)
                ->select('chats.user_id','users.image','chats.message','chats.type')
                ->join('users','users.id','=','chats.user_id')
                ->get();
        return $this->OK(ChatResource::collection($list));
    }

    public function store(ChatRequest $request)
    {
        $chat = $this->chatService->fill($request);

        $message = $chat->user->first_name . ' send message to you From his Request and Request Id Is '.$chat->demand->id;
        $url = url(route("admin.chats.index", ['demand_id' => $chat->demand->id, 'user_id' => $chat->demand->user_id]));
        $user_ids = $chat->demand->managers->pluck('id');
        if(!count($user_ids)){
          $user_ids = (array) $chat->demand->admin_id;
        }
        notification($user_ids, $message , $url ,'web',1,$chat->demand->id);

        broadcast(new ChatEvent($chat->id , $request->demand_id,$user_ids))->toOthers();
        return $this->OK($chat, "new Chat Added");
    }
}
