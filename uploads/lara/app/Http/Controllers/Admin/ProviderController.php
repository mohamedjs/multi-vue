<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repository\ProviderRepository;
use App\Http\Requests\Admin\ProviderRequest;
use App\Http\Services\ProviderService;
use App\Http\Repository\CityRepository;
use App\Http\Repository\AreaRepository;
use App\Http\Repository\CategoryRepository;
use App\Models\Provider;
use App\Models\Category;
use App\Models\Area;
use App\Models\City;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * @var ProviderRepository
     */
    private $providerRepository;
    /**
     * @var ProviderService
     */
    private $providerService;
    /**
     * @var CityRepository
     */
    private $cityRepository;
    /**
     * @var AreaRepository
     */
    private $areaRepository;
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * ProviderController constructor.
     * @param ProviderRepository $providerRepository
     * @param ProviderService $providerService
     * @param CityRepository $cityRepository
     * @param AreaRepository $areaRepository
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(
      ProviderRepository $providerRepository,
      ProviderService $providerService,
      CityRepository $cityRepository,
      AreaRepository $areaRepository,
      CategoryRepository $categoryRepository
      )
    {
        $this->providerRepository = $providerRepository;
        $this->providerService = $providerService;
        $this->areaRepository     = $areaRepository;
        $this->cityRepository     = $cityRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index(Request $request)
    {
        $this->authorize("index", Provider::class);

        $list = $this->providerRepository->search($request)
                ->orderByDesc("id")
                ->paginate(10);

        $category = $this->categoryRepository->search($request)
            ->select('id', 'name')
            ->get();

        $areas = $this->areaRepository->search($request)
            ->select('id', 'name')
            ->get();

        $citys = $this->cityRepository->search($request)
            ->select('id', 'name')
            ->get();
        return view("admin.providers.index", compact("list","category","areas",'citys'));
    }

    public function create(Request $request)
    {
        $this->authorize("create", Provider::class);

        $category = $this->categoryRepository->search($request)
          ->select('id', 'name')
          ->get();

        $areas = $this->areaRepository->search($request)
          ->select('id', 'name')
          ->get();

        $citys = $this->cityRepository->search($request)
          ->select('id', 'name')
          ->get();
        return view("admin.providers.create",compact('category',"areas","citys"));
    }

    public function store(ProviderRequest $request)
    {
        $this->authorize("create", Provider::class);

        $this->providerService->fill($request);

        return redirect()->route("admin.providers.index")->with("success", "Item Added Successfully");
    }

    public function edit(Provider $provider,Request $request)
    {
        $this->authorize("update", $provider);

        $category = $this->categoryRepository->search($request)
          ->select('id', 'name')
          ->get();

        $areas = $this->areaRepository->search($request)
          ->select('id', 'name')
          ->get();

        $citys = $this->cityRepository->search($request)
          ->select('id', 'name')
          ->get();

        return view("admin.providers.edit", compact("provider","category","areas","citys"));
    }

    public function update(ProviderRequest $request, Provider $provider)
    {
        $this->authorize("update", $provider);

        $this->providerService->fill($request, $provider);

        return redirect()->route("admin.providers.index")->with("success", "Item Updated Successfully");
    }

    public function destroy(Provider $provider)
    {
        $this->authorize("delete", $provider);

        $provider->delete();

        return back()->with("success", "Item Deleted Successfully");
    }
}
