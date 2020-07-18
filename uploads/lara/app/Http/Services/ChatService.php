<?php


namespace App\Http\Services;



use App\Models\Chat;
use Illuminate\Http\Request;

class ChatService
{
    public function __construct(UploaderService $uploaderService)
    {
        $this->uploaderService = $uploaderService;
    }

    public function fill(Request $request, Chat $chat = null)
    {
        if (!$chat) {
            $chat = new Chat();
        }

        $chat->fill($request->request->all());

        if($request->type == 2){
          $chat->message = $this->uploaderService->upload($request->file("message"), "messages");
        }

        $chat->save();

        return $chat;
    }
}
