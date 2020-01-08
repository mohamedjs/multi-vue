<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use App\Models\Advertisement;
use App\Http\Requests\Api\AdvertismentRequest;
use App\Http\Repository\AdvertismentRepository;
use App\Http\Services\AdvertismentServices;

class AdvertismentController extends Controller
{
  /**
   * @var advertismentServices
   */
  private $advertismentServices;
  /**
   * @var advertismentRepository
   */
  private $advertismentRepository;

  public function __construct(AdvertismentRepository $advertismentRepository ,AdvertismentServices $advertismentServices)
  {
      $this->advertismentRepository = $advertismentRepository  ;
      $this->advertismentServices   = $advertismentServices    ;
  }

  public function index(Request $request)
  {
    $advertisments = $this->advertismentRepository->AdvertismentWithFiltration(request());
    $data['advertisments'] = $advertisments;
    return response()->json(['status' => 'success' , 'data' => $data , 'message' => 'Get All Advertisment']);
  }

  public function store(AdvertismentRequest $request)
  {
    $advertisment = $this->advertismentServices->fillAdvertismentFromRequest($request);
    return response()->json(['data' => $advertisment , 'status' => 'success' , 'message' => 'Advertisment Added Successfully']);
  }

  public function edit($id)
  {
    $advertisment = Advertisement::find($id);
    return response()->json(['status' => 'success' , 'data' => $advertisment , 'message' => 'Get Advertisment For Edit Success']);
  }

  public function update(AdvertismentRequest $request,Advertisement $advertisment)
  {
    $advertisment = $this->advertismentServices->fillAdvertismentFromRequest($request,$advertisment);
    return response()->json(['status' => 'success' , 'data' => $advertisment , 'message' => 'Update Advertisment SuccessFully']);
  }

  public function destroy($id)
  {
    $advertisment = Advertisement::find($id)->delete();
    return response()->json(['status' => 'success' , 'data' => (object)[] , 'message' => 'Delete Advertisment SuccessFully']);
  }
}
