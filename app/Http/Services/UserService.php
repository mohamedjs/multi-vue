<?php
/**
 * Created by PhpStorm.
 * User: ghost
 * Date: 6/1/19
 * Time: 12:58 AM
 */

namespace App\Http\Services;

use App\Models\User;
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

    public function fill(Request $request, User $user = null)
    {
        if (!$user) {
            $user = new User();
        }
        
        $user->fill($request->all());

        $user->save();

        if($request->hasFile('image')){
            $this->updatePhoto($request, $user);
        }

        return $user;
    }

    public function updatePhoto(Request $request, User $user) {
        $user->image = $this->uploaderService->upload($request->file("image"), "users");
        $user->save();

        return true;
    }
}
