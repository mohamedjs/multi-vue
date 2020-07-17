<?php
namespace App\Http\Repository;

use App\Models\User;
use Illuminate\Http\Request;

class UserRepository
{
    public function search(Request $request)
    {
      $users = User::query();

      if($request->has('email') && $request->email != ''){
        $users = $users->where('email',$request->email);
      }
      
      return $users;
    }
}
