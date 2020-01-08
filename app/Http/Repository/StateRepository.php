<?php
namespace App\Http\Repository;

use App\Models\State;
use Illuminate\Http\Request;

class StateRepository
{
    public function StateWithFiltration(Request $request)
    {
      $per_page  = 10;
      $states = State::with('country');
      if($request->has('per_page')){
        $per_page = $request->per_page;
      }
      if($request->has('country_id') && $request->country_id != ''){
          $states = $states->where('country_id',$request->country_id);
      }
      if($request->has('search') && $request->search != ''){
        $states = $states->whereLike(['name', 'country_id'],$request->search);
      }
      $states = $states->latest('states.created_at')->Paginate($per_page);
      $states->appends($request->all());
      return $states;
    }
}
