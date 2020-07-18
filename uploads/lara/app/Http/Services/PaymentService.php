<?php


namespace App\Http\Services;


use App\Models\Payment;
use Illuminate\Http\Request;
use App\Constants\DemandStatus;

class PaymentService
{
    /**
     * @var UploaderService
     */
    private $uploaderService;
    /**
     * @var DemandService
     */
    private $demandService;

    /**
     * PaymentService constructor.
     * @param UploaderService $uploaderService
     * @param DemandService $demandService
     */
    public function __construct(UploaderService $uploaderService, DemandService $demandService)
    {
        $this->uploaderService = $uploaderService;
        $this->demandService = $demandService;
    }

    public function fill(Request $request, Payment $payment = null)
    {
        if (!$payment) {
            $payment = new Payment();
        }

        $payment->fill($request->all());

        $payment->save();

        if ($request->hasFile("image")) {
            $this->updatePhoto($request, $payment);
        }

        return $payment;
    }

    public function updatePhoto(Request $request, Payment $payment) {
        $payment->image = $this->uploaderService->upload($request->file("image"), "payments");
        $payment->save();

        $demand = $payment->demand;
        $demand->receipt = $payment->fresh()->image;
        $demand->status  =  DemandStatus::AnswerRequest;
        $demand->save();

        return true;
    }
}
