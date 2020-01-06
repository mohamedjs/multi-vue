<?php
namespace App\Http\Repository;

use App\Brand;
use Illuminate\Http\Request;

class BrandRepository
{
    public function BrandWithFiltration(Request $request)
    {
      $per_page  = 10;
      $brands = Brand::latest('brands.created_at');
      if($request->has('per_page')){
        $per_page = $request->per_page;
      }
      if($request->has('search') && $request->search != ''){
        $brands = $brands->whereLike(['title'],$request->search);
      }
      $brands = $brands->Paginate($per_page);
      $brands->appends($request->all());
      return $brands;
    }
}
