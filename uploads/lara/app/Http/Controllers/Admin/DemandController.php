<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repository\DemandRepository;
use App\Http\Requests\Admin\DemandRequest;
use App\Http\Services\DemandService;
use App\Http\Repository\UserRepository;
use App\Http\Repository\ProviderRepository;
use App\Constants\DemandStatus;
use App\Models\Demand;
use App\Models\DemandDetails;
use Auth;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DemandController extends Controller
{

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var UserRepository
     */
    private $providerRepository;

    /**
     * @var DemandRepository
     */
    private $demandRepository;
    /**
     * @var DemandService
     */
    private $demandService;

    /**
     * DemandController constructor.
     * @param DemandRepository $demandRepository
     * @param DemandService $demandService
     */
    public function __construct(DemandRepository $demandRepository, DemandService $demandService , UserRepository $userRepository, ProviderRepository $providerRepository)
    {
        $this->demandRepository = $demandRepository;
        $this->demandService = $demandService;
        $this->userRepository = $userRepository;
        $this->providerRepository = $providerRepository;
    }

    public function index(Request $request)
    {
        $this->authorize("index", Demand::class);

        $list = $this->demandRepository->search($request)
            ->orderByDesc("id");

        if (!Auth::user()->hasAccess("admin.demands.assignees.create")) {
            $list = $list->WhereHas("managers", function ($query) {
                    $query->where("user_id", "=", Auth::id());
                });

            if (Auth::user()->hasAccess("admin.demands.assignees.himself")) {
                $list = $list->orWhereDoesntHave("managers");
            }
        }

        if ($request->get("per_page") != '*') {
            $list = $list->paginate(request('per_page',10));

            $list->appends($request->all());
        } else {
            $list = $list->get();
        }


        $users = $this->userRepository->search($request)
                ->where('type',3)
                ->orderByDesc("id")->get();

        $providers = $this->providerRepository->search($request)
                ->orderByDesc("id")->get();

        return view("admin.demands.index", compact("list","users","providers"));
    }

    public function create()
    {
        return view("admin.demands.create");
    }

    public function store(DemandRequest $request)
    {
        $this->demandService->fill($request);

        return redirect()->route("admin.demands.index")->with("success", "Item Added Successfully");
    }

    public function show(Demand $demand)
    {
        $this->authorize("show", $demand);

        $isRequestManager = auth()->user()->manageDemands()
            ->where("demand_id", "=", $demand->id)
            ->first();

        if (!$isRequestManager) {
            abort(403, "You are not a manager for this request");
        }

        return view("admin.demands.show", compact("demand"));
    }

    public function edit(Demand $demand , Request $request)
    {
        $this->authorize("update", $demand);

        $isRequestManager = auth()->user()->manageDemands()
            ->where("demand_id", "=", $demand->id)
            ->first();

        if (!$isRequestManager) {
            abort(403, "You are not a manager for this request");
        }

        $providers = $this->providerRepository->search($request)
              ->orderByDesc("id")->get();
        return view("admin.demands.edit", compact("demand","providers"));
    }

    public function update(DemandRequest $request, Demand $demand)
    {
        $this->authorize("update", $demand);

        $old_status = $demand->status;
        $demand = $this->demandService->fill($request, $demand);

        if($old_status != $request->status && !$request->hasFile('answer_demand')){
          //$message = "Your Request ". $demand->name." Now It Was In Status ". DemandStatus::getLabel($request->status);
          $message = " لقد تم تغير حاله الطلب ". $demand->name. " الى " .DemandStatus::getLabel($request->status,'ar');
          notification((array) $demand->user_id, $message , null , 'mobile',2,$demand->id);
        }

        if($request->hasFile("answer_demand")){
          $message = "لقد تم تغيير صورة جواب الطلب". $demand->name;
          notification((array) $demand->user_id, $message , null , 'mobile',2,$demand->id);
        }


        if($request->has('chat')){
          return back();
        }

        return redirect(route('admin.demands.index'))->with("success", "Item Updated Successfully");
    }

    /**
     * @param Demand $demand
     * @return RedirectResponse
     * @throws AuthorizationException
     * @throws Exception
     */
    public function destroy(Demand $demand)
    {
        $this->authorize("delete", $demand);

        $demand->delete();

        return back()->with("success", "Item Deleted Successfully");
    }

    /**
     * @param $id
     * @return string
     * @throws Exception
     */
    public function removeItem($id)
    {
      $item = DemandDetails::query()->find($id);
      $item->delete();
      return 'ok';
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function remove_all(Request $request)
    {
        $this->authorize("delete", new Demand());

        $user = $this->demandRepository->search($request)
              ->whereIn('id',explode(',',$request->demand_ids))
              ->delete();

      return back()->with('success', "Delete ".count(explode(',',$request->demand_ids))." demand Successfully");
    }
}
