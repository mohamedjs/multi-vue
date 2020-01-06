<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use App\Country;
use App\Http\Requests\Api\CountryRequest;
use App\Http\Repository\CountryRepository;
use App\Http\Services\CountryServices;

class CountryController extends Controller
{
  /**
   * @var countryServices
   */
  private $countryServices;
  /**
   * @var countryRepository
   */
  private $countryRepository;

  public function __construct(CountryRepository $countryRepository ,CountryServices $countryServices)
  {
      $this->countryRepository = $countryRepository  ;
      $this->countryServices   = $countryServices    ;
  }

  public function index(Request $request)
  {
    $countrys = $this->countryRepository->CountryWithFiltration(request());
    $data['countrys'] = $countrys;
    return response()->json(['status' => 'success' , 'data' => $data , 'message' => 'Get All Country']);
  }

  public function store(CountryRequest $request)
  {
    $country = $this->countryServices->fillCountryFromRequest($request);
    return response()->json(['data' => $country , 'status' => 'success' , 'message' => 'Country Added Successfully']);
  }

  public function edit($id)
  {
    $country = Country::find($id);
    return response()->json(['status' => 'success' , 'data' => $country , 'message' => 'Get Country For Edit Success']);
  }

  public function update(CountryRequest $request,Country $country)
  {
    $country = $this->countryServices->fillCountryFromRequest($request,$country);
    return response()->json(['status' => 'success' , 'data' => $country , 'message' => 'Update Country SuccessFully']);
  }

  public function destroy($id)
  {
    $country = Country::find($id)->delete();
    return response()->json(['status' => 'success' , 'data' => (object)[] , 'message' => 'Delete Country SuccessFully']);
  }
}
