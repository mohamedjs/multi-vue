<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use App\Http\Requests\Api\Admin\UserRequest;
use App\Http\Repository\UserRepository;
use App\Http\Services\UserStoreService;
use App\Http\Services\UserUpdateService;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;

class UserController extends Controller
{
  /**
   * @var userStoreService
   */
  private $userStoreService;
  /**
   * @var userUpdateService
   */
  private $userUpdateService;
  /**
   * @var userRepository
   */
  private $userRepository;

  public function __construct(UserRepository $userRepository ,UserStoreService $userStoreService, UserUpdateService $userUpdateService)
  {
      $this->userRepository     = $userRepository  ;
      $this->userStoreService   = $userStoreService    ;
      $this->userUpdateService  = $userUpdateService    ;
  }

  public function index(Request $request)
  {
    $users = $this->userRepository->filter($this->userFilters())
            ->paginate(request('per_page', 10));
            
    return response()->json(['status' => 'success' , 'data' => new UserCollection($users) , 'message' => 'Get All User'], 200);
  }

  public function store(UserStoreFormRequest $request)
  {
    $user = $this->userStoreService->handle($request->validated());
    return response()->json(['data' => '' , 'status' => 'success' , 'message' => 'User Added Successfully'], 204);
  }

  public function edit($id)
  {
    $user = $this->userRepository->find($id);
    return response()->json(['status' => 'success' , 'data' => $user , 'message' => 'Get User For Edit Success'], 200);
  }

  public function update(UserUpdateFormRequest $request,User $user)
  {
    $this->userUpdateService->handle($request->validated(),$user);
    $user = $this->userRepository->find($user->id);
    return response()->json(['status' => 'success' , 'data' => new UserResource($user) , 'message' => 'Update User SuccessFully'], 204);
  }

  public function destroy($id)
  {
    if(gettype($id) == 'string' && strpos($id, ',') !== false) {
      $user_ids = explode(',', $id);
      $user = $this->userRepository->whereIn('id', $user_ids)->delete();
    } else {
      $user = $this->userRepository->find($id)->delete();
    }
    return response()->json(['status' => 'success' , 'data' => (object)[] , 'message' => 'Delete User SuccessFully'] ,201);
  }
}
