<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use App\User;
use App\Http\Requests\Api\UserRequest;
use App\Http\Repository\UserRepository;
use App\Http\Services\UserServices;

class UserController extends Controller
{
  /**
   * @var userServices
   */
  private $userServices;
  /**
   * @var userRepository
   */
  private $userRepository;

  public function __construct(UserRepository $userRepository ,UserServices $userServices)
  {
      $this->userRepository = $userRepository  ;
      $this->userServices   = $userServices    ;
  }

  public function index(Request $request)
  {
    $users = $this->userRepository->UserWithFiltration(request());
    $data['users'] = $users;
    return response()->json(['status' => 'success' , 'data' => $data , 'message' => 'Get All User']);
  }

  public function store(UserRequest $request)
  {
    $user = $this->userServices->fillUserFromRequest($request);
    return response()->json(['data' => $user , 'status' => 'success' , 'message' => 'User Added Successfully']);
  }

  public function edit($id)
  {
    $user = User::with(['cities.state.country'])->whereId($id)->first();
    return response()->json(['status' => 'success' , 'data' => $user , 'message' => 'Get User For Edit Success']);
  }

  public function update(UserRequest $request,User $user)
  {
    $user = $this->userServices->fillUserFromRequest($request,$user);
    return response()->json(['status' => 'success' , 'data' => $user , 'message' => 'Update User SuccessFully']);
  }

  public function destroy($id)
  {
    $user = User::find($id)->delete();
    return response()->json(['status' => 'success' , 'data' => (object)[] , 'message' => 'Delete User SuccessFully']);
  }
}
