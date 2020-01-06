<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use App\City;
use App\Http\Requests\Api\CityRequest;
use App\Http\Repository\CityRepository;
use App\Http\Services\CityServices;

class CityController extends Controller
{
  /**
   * @var cityServices
   */
  private $cityServices;
  /**
   * @var cityRepository
   */
  private $cityRepository;

  public function __construct(CityRepository $cityRepository ,CityServices $cityServices)
  {
      $this->cityRepository = $cityRepository  ;
      $this->cityServices   = $cityServices    ;
  }

  public function index(Request $request)
  {
    $citys = $this->cityRepository->CityWithFiltration(request());
    $data['citys'] = $citys;
    return response()->json(['status' => 'success' , 'data' => $data , 'message' => 'Get All City']);
  }

  public function store(CityRequest $request)
  {
    $city = $this->cityServices->fillCityFromRequest($request);
    return response()->json(['data' => $city , 'status' => 'success' , 'message' => 'City Added Successfully']);
  }

  public function edit($id)
  {
    $city = City::with('state')->where('cities.id',$id)->first();
    return response()->json(['status' => 'success' , 'data' => $city , 'message' => 'Get City For Edit Success']);
  }

  public function update(CityRequest $request,City $city)
  {
    $city = $this->cityServices->fillCityFromRequest($request,$city);
    return response()->json(['status' => 'success' , 'data' => $city , 'message' => 'Update City SuccessFully']);
  }

  public function destroy($id)
  {
    $city = City::find($id)->delete();
    return response()->json(['status' => 'success' , 'data' => (object)[] , 'message' => 'Delete City SuccessFully']);
  }
}
