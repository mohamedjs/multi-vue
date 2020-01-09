<?php
namespace App\Http\Repository;

use App\User;
use Illuminate\Http\Request;

class UserRepository
{
    public function UserWithFiltration(Request $request)
    {
      $users = User::with(['cities.state.country'])->latest('created_at');
      $per_page  = 10;
      if($request->has('per_page')){
        $per_page = $request->per_page;
      }
      if($request->has('search') && $request->search != ''){
        $users = $users->whereLike(['name', 'email' ,'phone'],$request->search);
      }
      $users = $users->get();
      //$users->appends($request->all());
      return $users;
    }
}
