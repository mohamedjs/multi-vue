<?php

namespace App\Http\Controllers\Admin;

use App\Http\Repository\PaymentRepository;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    /**
     * @var PaymentRepository
     */
    private $paymentRepository;

    /**
     * PaymentController constructor.
     * @param PaymentRepository $paymentRepository
     */
    public function __construct(PaymentRepository $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }

    public function index(Request $request)
    {
        $this->authorize("index", Payment::class);

        $list = $this->paymentRepository->search($request)
            ->orderByDesc("id")
            ->paginate(10);

        $list->appends($request->all());

        return view("admin.payments.index", compact("list"));
    }
}
