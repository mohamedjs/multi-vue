<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repository\AreaRepository;
use App\Http\Repository\ProviderRepository;
use App\Http\Repository\UserRepository;
use App\Http\Repository\DemandRepository;
use App\Http\Repository\PaymentRepository;
use App\Models\User;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Payment;
class ReportController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var AreaRepository
     */
    private $areaRepository;
    /**
     * @var ProviderRepository
     */
    private $providerRepository;
    /**
     * @var DemandRepository
     */
    private $demandRepository;
    /**
     * @var PaymentRepository
     */
    private $paymentRepository;

    /**
     * UserController constructor.
     * @param UserRepository $userRepository
     * @param AreaRepository $areaRepository
     * @param ProviderRepository $providerRepository
     * @param DemandRepository $demandRepository
     * @throws AuthorizationException
     */
    public function __construct(
        UserRepository $userRepository,
        AreaRepository $areaRepository,
        ProviderRepository $providerRepository,
        DemandRepository $demandRepository,
        PaymentRepository $paymentRepository
    )
    {
        //$this->authorizeResource(User::class, "user");
        $this->userRepository        = $userRepository;
        $this->providerRepository    = $providerRepository;
        $this->areaRepository        = $areaRepository;
        $this->demandRepository      = $demandRepository;
        $this->paymentRepository    = $paymentRepository;
    }

    public function users(Request $request)
    {
        $this->authorize("users", User::class);

      $list = $this->paymentRepository->search($request)
               ->select('users.*','users.id as user_id',\DB::raw("sum(payments.amount) as amount_sum"),\DB::raw("count(demands.id) as demands_count"))
               ->join('users','users.id','=','payments.user_id')
               ->join('demands','demands.id','=','payments.request_id')
               ->where('users.type',3)
               ->groupBy('users.id')
               ->orderByDesc('demands_count')
               ->paginate(10);
      $list = $list->appends($request->all());
      return view('admin.reports.users_index',compact('list'));
    }

    public function providers(Request $request)
    {
        $this->authorize("providers", User::class);

        $list = $this->paymentRepository->search($request)
            ->select('providers.*','providers.name as provider_name','providers.id as provider_id',\DB::raw("sum(payments.amount) as amount_sum"),\DB::raw("count(demands.id) as demands_count"))
            ->join('demands','demands.id','=','payments.request_id')
            ->join('providers','demands.provider_id','=','providers.id')
            ->groupBy('providers.id')
            ->orderByDesc('demands_count')
            ->paginate(10);

        $list = $list->appends($request->all());

        return view('admin.reports.providers_index',compact('list'));
    }

    public function cities(Request $request)
    {
        $this->authorize("cities", User::class);

        $list = $this->paymentRepository->search($request)
            ->select('areas.id as area_id','areas.name as area_name','cities.name as city_name',\DB::raw("sum(payments.amount) as amount_sum"),
                \DB::raw("count(users.id) as user_count"),\DB::raw("count(demands.id) as demands_count"))
            ->join('demands','demands.id','=','payments.request_id')
            ->join('users','users.id','=','payments.user_id')
            ->join('areas','areas.id','=','users.area_id')
            ->join('cities','cities.id','=','areas.city_id')
            ->where('users.type',3)
            ->groupBy('areas.id')
            ->orderByDesc('amount_sum')
            ->paginate(10);

        $list = $list->appends($request->all());

        return view('admin.reports.areas_index',compact('list'));
    }

    public function financials(Request $request)
    {
        $this->authorize("financials", User::class);

        $list = $this->paymentRepository->search($request)
            ->select('payments.payment_method',\DB::raw("sum(payments.amount) as amount_sum"),\DB::raw("count(payments.amount) as payment_count"))
            ->groupBy('payments.payment_method')
            ->orderBy('payments.payment_method','asc')
            ->paginate(10);

        $list = $list->appends($request->all());

        return view('admin.reports.financials_index',compact('list'));
    }
}
