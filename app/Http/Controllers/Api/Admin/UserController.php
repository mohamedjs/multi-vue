<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use App\Http\Requests\Api\Admin\UserUpdateFormRequest;
use App\Http\Requests\Api\Admin\UserStoreFormRequest;
use App\Http\Repository\UserRepository;
use App\Http\Services\UserStoreService;
use App\Http\Services\UserUpdateService;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use App\Models\User;

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
  
  /**
   * get all user with paginate
   *
   * @return void
   */
  public function index()
  {
    $users = $this->userRepository->filter($this->userFilters())
            ->paginate(request('per_page', 10));
            
    return response()->json(['status' => 'success' , 'data' => new UserCollection($users) , 'message' => 'Get All User'], 200);
  }
  
  /**
   * store
   *
   * @param  UserStoreFormRequest $request
   * @return Response
   */
  public function store(UserStoreFormRequest $request)
  {
    $user = $this->userStoreService->handle($request->validated());
    return response()->json(['data' => '' , 'status' => 'success' , 'message' => 'User Added Successfully'], 204);
  }
  
  /**
   * edit
   *
   * @param  User $user
   * @return Response
   */
  public function edit(User $user)
  {
    if(!$user) {
      return response()->json(['status' => 'error' , 'data' => (object)[] , 'message' => 'Not ound User'], 404);
    }
    return response()->json(['status' => 'success' , 'data' => new UserResource($user) , 'message' => 'Get User For Edit Success'], 200);
  }
  
  /**
   * update
   *
   * @param  UserUpdateFormRequest $request
   * @param  User $user
   * @return Response
   */
  public function update(UserUpdateFormRequest $request,User $user)
  {
    $user = $this->userUpdateService->handle($request->validated(),$user);
    return response()->json(['status' => 'success' , 'data' => new UserResource($user) , 'message' => 'Update User SuccessFully'], 204);
  }
  
  /**
   * destroy
   *
   * @param  Integer|String $id
   * @return Response
   */
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
