<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\PaymentRequest;
use App\Http\Services\PaymentService;
use Illuminate\Http\Request;
use App\Events\NotificationEvent;
use App\Http\Controllers\Controller;
use App\Models\User;

class PaymentController extends APIController
{
    /**
     * @var PaymentService
     */
    private $paymentService;

    /**
     * PaymentController constructor.
     * @param PaymentService $paymentService
     */
    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function store(PaymentRequest $request)
    {
        $payment = $this->paymentService->fill($request);

        $message = $payment->demand->user->first_name.' '. $payment->demand->user->last_name.' Add New Payment With Receipt Place Check It';
        $user_ids = $payment->demand->managers->pluck('id');
        if(!count($user_ids)){
          $user_ids = User::where('type',1)->pluck('id');
        }
        $url = url(route("admin.demands.edit", ['demand' => $payment->demand]));
        notification($user_ids, $message , $url ,'web',2,$payment->demand->id);

        broadcast(new NotificationEvent($payment->demand->user,$user_ids,$message,'payment'))->toOthers();

        return $this->OK();
    }
}
