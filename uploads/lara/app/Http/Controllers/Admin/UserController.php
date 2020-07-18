<?php

namespace App\Http\Controllers\Admin;

use App\Constants\UserTypes;
use App\Http\Controllers\Controller;
use App\Http\Repository\CityRepository;
use App\Http\Repository\AreaRepository;
use App\Http\Repository\UserRepository;
use App\Http\Repository\CategoryRepository;
use App\Http\Requests\Admin\UserRequest;
use App\Http\Services\UserService;
use App\Models\Notification;
use App\Models\User;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var CityRepository
     */
    private $cityRepository;
    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var AreaRepository
     */
    private $areaRepository;
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * UserController constructor.
     * @param UserService $userService
     * @param UserRepository $userRepository
     * @param CityRepository $cityRepository
     * @param AreaRepository $areaRepository
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(
        UserService $userService,
        UserRepository $userRepository,
        CityRepository $cityRepository,
        AreaRepository $areaRepository,
        CategoryRepository $categoryRepository
    )
    {
        //$this->authorizeResource(User::class, "user");
        $this->userRepository     = $userRepository;
        $this->areaRepository     = $areaRepository;
        $this->cityRepository     = $cityRepository;
        $this->userService        = $userService;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     * @throws AuthorizationException
     */
    public function index(Request $request)
    {
        if (
            !auth()->user()->hasAccess("admin.users.index.admin") and
            !auth()->user()->hasAccess("admin.users.index")
        ) {
            abort(403, "This action is unauthorized.");
        }

        if (
            !auth()->user()->hasAccess("admin.users.index.admin") and $request->get("type")
            != UserTypes::USER
        ) {
            abort(403, "This action is unauthorized.");
        }

        $this->authorize("index", User::class);
        $list = $this->userRepository->search($request)
            ->orderByDesc("id");

        if ($request->get("per_page") != '*') {
            $list = $list->paginate(request('per_page'));
            $list->appends($request->all());
        } else {
            $list = $list->get();
        }

        $categories = $this->categoryRepository->search(new \Illuminate\Http\Request())
            ->select('id', 'name')
            ->get();

        $areas = $this->areaRepository->search(new \Illuminate\Http\Request())
            ->select('id', 'name')
            ->get();

        $citys = $this->cityRepository->search(new \Illuminate\Http\Request())
            ->select('id', 'name')
            ->get();

        return view("admin.users.index", compact('list', 'categories','areas','citys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return Response
     * @throws AuthorizationException
     */
    public function create(Request $request)
    {
        $this->authorize("create", User::class);

        $areas = $this->areaRepository->search($request)
          ->select('id', 'name')
          ->get();

      $citys = $this->cityRepository->search($request)
          ->select('id', 'name')
          ->get();

        return view("admin.users.create", compact('citys','areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return void
     * @throws AuthorizationException
     */
    public function store(UserRequest $request)
    {
        $this->authorize("create", User::class);

        $this->userService->fill($request);

        return redirect(route("admin.users.index",['type' => $request->type]))->with('success', "Add Item Successfully");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param User $user
     * @return Response
     * @throws AuthorizationException
     */
    public function edit(Request $request, User $user)
    {
        $this->authorize("update", $user);

        $areas = $this->areaRepository->search($request)
            ->select('id', 'name')
            ->get();

        $citys = $this->cityRepository->search($request)
            ->select('id', 'name')
            ->get();

        return view("admin.users.edit", compact('user', "citys",'areas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param User $user
     * @return Response
     * @throws AuthorizationException
     */
    public function update(UserRequest $request, User $user)
    {
        $this->authorize("update", $user);

        $this->userService->fill($request, $user);

        return redirect(route("admin.users.index",['type' => $request->type]))->with('success', "Item Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return void
     * @throws Exception
     */
    public function destroy(User $user)
    {
        $this->authorize("delete", $user);
        $user->delete();

        return back()->with("success", "Item Deleted Successfully");
    }


    public function send_notification(Request $request)
    {
      $user_ids = explode(',',$request->user_ids);
      notification($user_ids, $request->message , $request->url , 'mobile' , 3 , null);
      return back()->with("success", "Message Send Successfully");
    }

    public function last_notify()
    {
      $notify = Notification::latest('created_at')->first();
      return $notify;
    }

    public function read_all()
    {
      Notification::where('user_id',auth()->user()->id)->update(['seen' => 1]);
      return 'success';
    }

    public function remove_all(Request $request)
    {
      $user = $this->userRepository->search($request)
              ->whereIn('id',explode(',',$request->user_ids))
              ->delete();
      return back()->with('success', "Delete ".count(explode(',',$request->user_ids))." User Successfully");
    }
}
