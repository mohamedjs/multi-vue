<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Repository\AreaRepository;
use App\Http\Repository\ProviderRepository;
use App\Http\Repository\UserRepository;
use App\Http\Repository\DemandRepository;
use App\Http\Repository\PaymentRepository;
use App\Http\Repository\CategoryRepository;
use App\Http\Repository\CityRepository;

class HomeController extends Controller
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
     * @var CategoryRepository
     */
    private $catgoryRepository;
    /**
     * @var CityRepository
     */
    private $cityRepository;

    /**
     * UserController constructor.
     * @param UserRepository $userRepository
     * @param AreaRepository $areaRepository
     * @param ProviderRepository $providerRepository
     * @param DemandRepository $demandRepository
     * @param PaymentRepository $paymentRepository
     * @param CategoryRepository $cityRepository
     * @param CityRepository $cityRepository
     * @throws AuthorizationException
     */
    public function __construct(
        UserRepository $userRepository,
        AreaRepository $areaRepository,
        ProviderRepository $providerRepository,
        DemandRepository $demandRepository,
        PaymentRepository $paymentRepository,
        CategoryRepository $categoryRepository,
        CityRepository $cityRepository
    )
    {
        //$this->authorizeResource(User::class, "user");
        $this->userRepository        = $userRepository;
        $this->providerRepository    = $providerRepository;
        $this->areaRepository        = $areaRepository;
        $this->demandRepository      = $demandRepository;
        $this->paymentRepository     = $paymentRepository;
        $this->categoryRepository    = $categoryRepository;
        $this->cityRepository     = $cityRepository;
    }
    public function index(Request $request)
    {
        $user = $this->userRepository->search($request)
                ->where('type',3)
                ->count();
        $provider = $this->providerRepository->search($request)
                ->count();
        $area = $this->areaRepository->search($request)
                ->count();
        $city = $this->cityRepository->search($request)
                ->count();
        $demand= $this->demandRepository->search($request)
                ->count();
        $category= $this->categoryRepository->search($request)
                ->count();
        $cash= $this->paymentRepository->search($request)
               ->where('payment_method', 1)
                ->count();
        $visa= $this->paymentRepository->search($request)
               ->where('payment_method', 2)
                ->count();
        //report graph
        $user_graph = $this->paymentRepository->search($request)
                 ->select('users.*','users.id as user_id',\DB::raw("sum(payments.amount) as amount_sum"),\DB::raw("count(demands.id) as demands_count"))
                 ->join('users','users.id','=','payments.user_id')
                 ->join('demands','demands.id','=','payments.request_id')
                 ->where('users.type',3)
                 ->groupBy('users.id')
                 ->orderByDesc('demands_count')
                 ->limit(10)->get();
        $provider_graph = $this->paymentRepository->search($request)
                ->select('providers.*','providers.name as provider_name','providers.id as provider_id',\DB::raw("sum(payments.amount) as amount_sum"),\DB::raw("count(demands.id) as demands_count"))
                ->join('demands','demands.id','=','payments.request_id')
                ->join('providers','demands.provider_id','=','providers.id')
                ->groupBy('providers.id')
                ->orderByDesc('demands_count')
                ->limit(10)->get();
        $area_graph = $this->paymentRepository->search($request)
              ->select('areas.id as area_id','areas.name as area_name','cities.name as city_name',\DB::raw("sum(payments.amount) as amount_sum"),
              \DB::raw("count(users.id) as user_count"),\DB::raw("count(demands.id) as demands_count"))
              ->join('demands','demands.id','=','payments.request_id')
              ->join('users','users.id','=','payments.user_id')
              ->join('areas','areas.id','=','users.area_id')
              ->join('cities','cities.id','=','areas.city_id')
              ->where('users.type',3)
              ->groupBy('areas.id')
              ->orderByDesc('amount_sum')
              ->limit(10)->get();
        $payment_graph = $this->paymentRepository->search($request)
                   ->select('payments.payment_method',\DB::raw("sum(payments.amount) as amount_sum"),\DB::raw("count(payments.amount) as payment_count"))
                   ->groupBy('payments.payment_method')
                   ->orderBy('payments.payment_method','asc')
                   ->limit(10)->get();
        return view("admin.dashboard",compact('user','provider','category','area','city','demand','cash','visa',
                    'user_graph','provider_graph','area_graph','payment_graph'));
    }
}
