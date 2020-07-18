<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use App\Models\User;
use App\Http\Requests\Api\Admin\UserRequest;
use App\Http\Repository\UserRepository;
use App\Http\Services\UserService;

class UserController extends Controller
{
  /**
   * @var userService
   */
  private $userService;
  /**
   * @var userRepository
   */
  private $userRepository;

  public function __construct(UserRepository $userRepository ,UserService $userService)
  {
      $this->userRepository = $userRepository  ;
      $this->userService   = $userService    ;
  }

  public function index(Request $request)
  {
    $users = $this->userRepository->search(request());
    $data['users'] = $users;
    return response()->json(['status' => 'success' , 'data' => $data , 'message' => 'Get All User']);
  }

  public function store(UserRequest $request)
  {
    $user = $this->userService->fill($request);
    return response()->json(['data' => $user , 'status' => 'success' , 'message' => 'User Added Successfully']);
  }

  public function edit($id)
  {
    $user = User::with(['cities.state.country'])->whereId($id)->first();
    return response()->json(['status' => 'success' , 'data' => $user , 'message' => 'Get User For Edit Success']);
  }

  public function update(UserRequest $request,User $user)
  {
    $user = $this->userService->fill($request,$user);
    return response()->json(['status' => 'success' , 'data' => $user , 'message' => 'Update User SuccessFully']);
  }

  public function destroy($id)
  {
    $user = User::find($id)->delete();
    return response()->json(['status' => 'success' , 'data' => (object)[] , 'message' => 'Delete User SuccessFully']);
  }
}
