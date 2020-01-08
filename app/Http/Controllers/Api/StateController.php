<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use App\Models\State;
use App\Http\Requests\Api\StateRequest;
use App\Http\Repository\StateRepository;
use App\Http\Services\StateServices;

class StateController extends Controller
{
  /**
   * @var stateServices
   */
  private $stateServices;
  /**
   * @var stateRepository
   */
  private $stateRepository;

  public function __construct(StateRepository $stateRepository ,StateServices $stateServices)
  {
      $this->stateRepository = $stateRepository  ;
      $this->stateServices   = $stateServices    ;
  }

  public function index(Request $request)
  {
    $states = $this->stateRepository->StateWithFiltration(request());
    $data['states'] = $states;
    return response()->json(['status' => 'success' , 'data' => $data , 'message' => 'Get All State']);
  }

  public function store(StateRequest $request)
  {
    $state = $this->stateServices->fillStateFromRequest($request);
    return response()->json(['data' => $state , 'status' => 'success' , 'message' => 'State Added Successfully']);
  }

  public function edit($id)
  {
    $state = State::with('country')->where('states.id',$id)->first();
    return response()->json(['status' => 'success' , 'data' => $state , 'message' => 'Get State For Edit Success']);
  }

  public function update(StateRequest $request,State $state)
  {
    $state = $this->stateServices->fillStateFromRequest($request,$state);
    return response()->json(['status' => 'success' , 'data' => $state , 'message' => 'Update State SuccessFully']);
  }

  public function destroy($id)
  {
    $state = State::find($id)->delete();
    return response()->json(['status' => 'success' , 'data' => (object)[] , 'message' => 'Delete State SuccessFully']);
  }
}
