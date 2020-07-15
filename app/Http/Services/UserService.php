<?php
/**
 * Created by PhpStorm.
 * User: ghost
 * Date: 6/1/19
 * Time: 12:58 AM
 */

namespace App\Http\Services;

use App\User;
use Illuminate\Http\Request;

class UserService
{
    /**
     * @var UploaderService
     */
    private $uploaderService;


    /**
     * UserServices constructor.
     */
    public function __construct(UploaderService $uploaderService)
    {
        $this->uploaderService = $uploaderService;
    }

    public function fillUserFromRequest(Request $request, User $user = null)
    {
        if (!$user) {
            $user = new User();
        }
        $data = $request->all();
        if($request->hasFile('image')){
          $img = $this->uploaderService->upload($request->image, "users") ;
          $data = $request->except(['image']);
          $data['image'] = $img;
        }
        $user->fill($data);
        $user->save();

        return $user;
    }
}
