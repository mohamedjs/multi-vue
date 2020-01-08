<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use App\Models\Brand;
use App\Http\Requests\Api\BrandRequest;
use App\Http\Repository\BrandRepository;
use App\Http\Services\BrandServices;
use App\Http\Resources\BrandResource;
use App\Http\Resources\BrandCollection;
class BrandController extends Controller
{
  /**
   * @var brandServices
   */
  private $brandServices;
  /**
   * @var brandRepository
   */
  private $brandRepository;

  public function __construct(BrandRepository $brandRepository ,BrandServices $brandServices)
  {
      $this->brandRepository = $brandRepository  ;
      $this->brandServices   = $brandServices    ;
  }

  public function index(Request $request)
  {
    $brands = $this->brandRepository->BrandWithFiltration(request());
    $data['brands'] = new BrandCollection($brands);
    return response()->json(['status' => 'success' , 'data' => $data , 'message' => 'Get All Brand']);
  }

  public function store(BrandRequest $request)
  {
    $brand = $this->brandServices->fillBrandFromRequest($request);
    return response()->json(['data' => $brand , 'status' => 'success' , 'message' => 'Brand Added Successfully']);
  }

  public function edit($id)
  {
    $brand = new BrandResource(Brand::where('id',$id)->first());
    return response()->json(['status' => 'success' , 'data' => $brand , 'message' => 'Get Brand For Edit Success']);
  }

  public function update(BrandRequest $request,Brand $brand)
  {
    $brand = $this->brandServices->fillBrandFromRequest($request,$brand);
    return response()->json(['status' => 'success' , 'data' => $brand , 'message' => 'Update Brand SuccessFully']);
  }

  public function destroy($id)
  {
    $brand = Brand::find($id)->delete();
    return response()->json(['status' => 'success' , 'data' => (object)[] , 'message' => 'Delete Brand SuccessFully']);
  }
}
