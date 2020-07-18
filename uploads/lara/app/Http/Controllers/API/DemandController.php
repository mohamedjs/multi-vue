<?php

namespace App\Http\Controllers\API;

use App\Http\Repository\DemandRepository;
use App\Http\Requests\API\DemandRequest;
use App\Http\Services\DemandService;
use App\Events\NotificationEvent;
use App\Models\Demand;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DemandController extends APIController
{
    /**
     * @var DemandService
     */
    private $demandService;
    /**
     * @var DemandRepository
     */
    private $demandRepository;

    /**
     * DemandController constructor.
     * @param DemandService $demandService
     * @param DemandRepository $demandRepository
     */
    public function __construct(DemandService $demandService, DemandRepository $demandRepository)
    {
        $this->demandService = $demandService;
        $this->demandRepository = $demandRepository;
    }

    public function show(Demand $demand)
    {
        return $this->OK(["image" => $demand->answer_demand]);
    }

    public function index(Request $request)
    {
        $request->query->add(['user_id' => Auth::id()]);

        $demands = $this->demandRepository->search($request)
            ->select('demands.*','providers.image as image')
            ->join('providers','providers.id','demands.provider_id')
            ->with('items:demand_id,title')
            ->orderByDesc("id")
            ->get();

        return $this->OK($demands);
    }

    public function store(DemandRequest $request)
    {
        $demand = $this->demandService->fill($request);

        $message = $demand->user->first_name.' '. $demand->user->last_name.' Add New Request Please Check It';
        $user_ids = User::where('type',1)->pluck('id');
        $url = url(route("admin.demands.assignees.create", ['demand' => $demand]));
        notification($user_ids, $message , $url ,'web',2,$demand->id);
        broadcast(new NotificationEvent($demand->user,$user_ids,$message , 'request'))->toOthers();

        return $this->OK($demand, "new Request Added");
    }

    public function updatefawry(Request $request)
    {
      $demand = Demand::find($request->demand_id)->update(['fawry_number' => $request->fawry_number]);

      return $this->OK();
    }
}
