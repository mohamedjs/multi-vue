<?php
namespace App\Http\Repository;

use App\Category;
use Illuminate\Http\Request;

class CategoryRepository
{
    public function CategoryWithFiltration(Request $request)
    {
      $per_page  = 10;
      $categorys = Category::with('cat')->withCount('sub_cats')->latest('categories.created_at');
      if($request->has('parent_id') && $request->parent_id != ''){
        $categorys = $categorys->where('parent_id' , $request->parent_id);
      }
      else{
        $categorys = $categorys->whereNull('parent_id');
      }
      if($request->has('per_page')){
        $per_page = $request->per_page;
      }
      if($request->has('search') && $request->search != ''){
        $categorys = $categorys->whereLike(['title', 'coding' ,'parent_id'],$request->search);
        if($request->has('parent_id') && $request->parent_id != ''){
          $categorys = $categorys->orWhereHas('cat', function($query) use ($request){
                $query->where('title', 'like', "%{$request->search}%");
          });
        }
      }
      $categorys = $categorys->Paginate($per_page);
      $categorys->appends($request->all());
      return $categorys;
    }
}
