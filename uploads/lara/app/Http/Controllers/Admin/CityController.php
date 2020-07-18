<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repository\CityRepository;
use App\Http\Requests\Admin\CityRequest;
use App\Http\Services\CityService;
use App\Models\City;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CityController extends Controller
{
    /**
     * @var CityRepository
     */
    private $cityRepository;
    /**
     * @var CityService
     */
    private $cityService;

    /**
     * CityController constructor.
     * @param CityRepository $cityRepository
     * @param CityService $cityService
     */
    public function __construct(CityRepository $cityRepository, CityService $cityService)
    {
        $this->cityRepository = $cityRepository;
        $this->cityService = $cityService;
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
        $this->authorize("index", City::class);

        $list = $this->cityRepository->search($request)
            ->orderByDesc('id')
            ->paginate(10);

        return view("admin.cities.index", compact("list"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize("create", City::class);

        return view("admin.cities.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CityRequest $request
     * @return Response
     * @throws AuthorizationException
     */
    public function store(CityRequest $request)
    {
        $this->authorize("create", City::class);

        $this->cityService->fill($request);

        return redirect()->route("admin.cities.index")->with("success", trans("Item Stored Success fully"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param City $city
     * @return Response
     * @throws AuthorizationException
     */
    public function edit(City $city)
    {
        $this->authorize("update", $city);

        return view("admin.cities.edit", compact("city"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CityRequest $request
     * @param City $city
     * @return Response
     * @throws AuthorizationException
     */
    public function update(CityRequest $request, City $city)
    {
        $this->authorize("update", $city);

        $this->cityService->fill($request, $city);

        return redirect()->route("admin.cities.index")->with("success", "Item Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param City $city
     * @return Response
     * @throws Exception
     */
    public function destroy(City $city)
    {
        $this->authorize("delete", $city);

        $city->delete();

        return back()->with("success", "Item Deleted Successfully");
    }
}
