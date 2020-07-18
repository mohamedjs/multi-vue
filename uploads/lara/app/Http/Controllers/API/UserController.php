<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Repository\DemandRepository;
use App\Http\Repository\UserRepository;
use App\Http\Requests\API\AddProviderToUserFavorites;
use App\Http\Requests\API\ChangePasswordRequest;
use App\Http\Requests\API\LawyerCategoriesRequest;
use App\Http\Requests\API\PhotoRequest;
use App\Http\Requests\API\UserRequest;
use App\Http\Requests\API\ForgetPasswordRequest;
use App\Http\Requests\UpdateDeviceTokenRequest;
use App\Http\Services\UserService;
use App\Models\User;
use App\Models\Notification;
use Auth;
use Mail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends APIController
{
    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var DemandRepository
     */
    private $demandRepository;

    /**
     * UserController constructor.
     * @param UserService $userService
     * @param UserRepository $userRepository
     * @param DemandRepository $demandRepository
     */
    public function __construct(UserService $userService, UserRepository $userRepository, DemandRepository $demandRepository)
    {
        $this->userService = $userService;
        $this->userRepository = $userRepository;
        $this->demandRepository = $demandRepository;
    }

    public function index(Request $request)
    {
        $users = $this->userRepository->search($request)->get();

        return $this->OK($users);
    }

    public function show(User $user)
    {
        return $this->OK($user);
    }

    /**
     * @param UserRequest $request
     * @return User
     */
    public function update(UserRequest $request)
    {
        $request->merge(["active" => Auth::user()->active]);
        $user = $this->userService->fill($request, Auth::user());

        return $this->OK($user);
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $request->merge(["active" => Auth::user()->active]);
        $this->userService->fill($request, Auth::user());

        return $this->OK((object)[]);
    }

    /**
     * @param PhotoRequest $request
     * @return JsonResponse
     */
    public function updatePhoto(PhotoRequest $request)
    {
        $user = $this->userService->updatePhoto($request, Auth::user());

        return $this->OK();
    }

    public function demands(Request $request)
    {
        $request->query->add(["user_id" => auth()->id()]);

        $demands = $this->demandRepository->search($request)
            ->with('items:demand_id,title')
            ->get();

        return $this->OK($demands, "My Requests");
    }

    public function toggleProvider(AddProviderToUserFavorites $request)
    {
        $user = auth()->user();
        $attached =  $user->providers()->toggle($request->input("provider_id"));

        return $this->OK(in_array($request->input("provider_id"), $attached['attached']));
    }

    public function updateDeviceToken(UpdateDeviceTokenRequest $request)
    {
        if (!auth()->user()->active) {
            return $this->error("your account is In Active from admin");
        }
        $request->merge(["active" => Auth::user()->active]);
        $this->userService->fill($request, Auth::user());

        return $this->OK();
    }

    public function forGetPassword(ForgetPasswordRequest $request)
    {
      $user = $this->userRepository->search($request)->first();

      $password = rand(100000000,999999999);

      $user->password = $password;

      $user->save();

      Mail::send('admin.auth.forgetPassword', ['password' => $password], function ($m) use ($request) {
            $m->from('mh124404@gmail.com', 'insurence');
            $m->to($request->email, 'insurence')->subject('forGetPassword');
      });

      return $this->OK();
    }

    public function all_notification()
    {
      $notify = Notification::select('notifications.user_id','notifications.message','notifications.type','notifications.demand_id','notifications.url')
              ->where('user_id',auth()->user()->id)
              ->latest('created_at')
              ->get();

      return $this->OK($notify);
    }
}
