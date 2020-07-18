<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repository\AreaRepository;
use App\Http\Repository\CityRepository;
use App\Http\Requests\Admin\AreaRequest;
use App\Http\Services\AreaService;
use App\Models\Area;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Exception;

class AreaController extends Controller
{
    /**
     * @var AreaRepository
     */
    private $areaRepository;
    /**
     * @var CityRepository
     */
    private $cityRepository;
    /**
     * @var AreaService
     */
    private $areaService;

    /**
     * AreaController constructor.
     * @param AreaRepository $areaRepository
     * @param AreaService $areaService
     * @param CityRepository $cityRepository
     */
    public function __construct(
        AreaRepository $areaRepository,
        AreaService $areaService,
        CityRepository $cityRepository
    )
    {
        $this->areaRepository = $areaRepository;
        $this->cityRepository = $cityRepository;
        $this->areaService = $areaService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     * @throws AuthorizationException
     */
    public function index(Request $request)
    {
        $this->authorize("index", Area::class);

        $list = $this->areaRepository->search($request)
            ->orderByDesc("id")
            ->paginate(10);
        $list->appends($request->all());
        return view("admin.areas.index", compact("list"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function create(Request $request)
    {
        $this->authorize("create", Area::class);

        $cities = $this->cityRepository->search($request)->get();

        return view("admin.areas.create", compact("cities"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AreaRequest $request
     * @return Response
     * @throws AuthorizationException
     */
    public function store(AreaRequest $request)
    {
        $this->authorize("create", Area::class);

        $this->areaService->fill($request);

        return redirect()->route("admin.areas.index")->with("success", trans("Item Stored Successfully"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param Area $area
     * @return Response
     * @throws AuthorizationException
     */
    public function edit(Request $request, Area $area)
    {
        $this->authorize("update", $area);

        $cities = $this->cityRepository->search($request)->get();

        return view("admin.areas.edit", compact("area", "cities"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AreaRequest $request
     * @param Area $area
     * @return Response
     * @throws AuthorizationException
     */
    public function update(AreaRequest $request, Area $area)
    {
        $this->authorize("update", $area);

        $this->areaService->fill($request, $area);

        return redirect()->route("admin.areas.index")->with("success", "Item Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Area $area
     * @return Response
     * @throws Exception
     */
    public function destroy(Area $area)
    {
        $this->authorize("delete", $area);

        $area->delete();

        return back()->with("success", trans("Item Deleted Successfully"));
    }
}
