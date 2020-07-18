<?php


namespace App\Http\Repository;


use App\Models\Payment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PaymentRepository
{
    /**
     * @param Request $request
     * @return Builder
     */
    public function search(Request $request)
    {
        $payments = Payment::query();

        if ($request->filled("id")) {
            $payments->where("id", "=", (int)$request->query->get("id"));
        }

        if ($request->filled("user_id")) {
            $payments->where("user_id", "=", (int)$request->query->get("user_id"));
        }

        if ($request->filled("transaction_id")) {
            $payments->where("transaction_id", "=", $request->get("transaction_id"));
        }

        if ($request->filled("from")) {
            $payments->where("amount", ">=", $request->get("from"));
        }

        if ($request->filled("to")) {
            $payments->where("amount", "<=", $request->get("to"));
        }

        if ($request->filled("from_date")) {
            $payments->whereDate("payments.created_at", ">=", $request->get("from_date"));
        }

        if ($request->filled("to_date")) {
            $payments->whereDate("payments.created_at", "<=", $request->get("to_date"));
        }

        if ($request->filled("payment_method")) {
            $payments->where("payment_method", "=", $request->get("payment_method"));
        }

        return $payments;
    }
}
