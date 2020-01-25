<?php
namespace App\Http\Repository;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductRepository
{
    public function ProductWithFiltration(Request $request)
    {
      $per_page  = 10;
      $products = Product::latest('products.created_at');
      if($request->has('per_page')){
        $per_page = $request->per_page;
      }
      if($request->has('search') && $request->search != ''){
        $products = $products->whereLike(['title'],$request->search);
      }
      $products = $products->Paginate($per_page);
      $products->appends($request->all());
      return $products;
    }
}
