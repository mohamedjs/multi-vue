<?php
namespace App\Http\Repository;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductRepository
{
    public function ProductWithFiltration(Request $request,$filter = Null)
    {
      $per_page  = 10;
      $products = Product::query();
      if($request->has('per_page')){
        $per_page = $request->per_page;
      }
      if($request->has('search') && $request->search != ''){
        $products = $products->whereLike(['title'],$request->search);
      }
      if($request->has('seller')){
        $products = $products->orderBy('seller','desc');
      }
      if($request->has('latest')){
        $products = $products->latest('created_at');
      }
      $products = $products->Paginate($per_page);
      $products->appends($request->all());
      return $products;
    }
}
