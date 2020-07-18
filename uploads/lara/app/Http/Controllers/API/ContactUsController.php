<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\ContactUsRequest;
use App\Http\Services\ContactUsService;
use Illuminate\Http\Request;
use App\Events\NotificationEvent;
use App\Models\User;
class ContactUsController extends APIController
{
    /**
     * @var ContactUsService
     */
    private $contactUsService;

    /**
     * ContactUsController constructor.
     * @param ContactUsService $contactUsService
     */
    public function __construct(ContactUsService $contactUsService)
    {
        $this->contactUsService = $contactUsService;
    }

    public function store(ContactUsRequest $request)
    {
        $contactUs = $this->contactUsService->fill($request);

        $message = $contactUs->user->first_name.' '. $contactUs->user->last_name.' Need Help Please See His Message In Support Requests';
        $user_ids = User::where('type',1)->pluck('id');
        $url = url(route("admin.contact.us.index"));
        notification($user_ids, $message, $url,'web',null,null);

        broadcast(new NotificationEvent($contactUs->user,$user_ids,$message,'contact'))->toOthers();
        return $this->OK($contactUs);
    }
}
