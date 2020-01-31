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
      if($request->has('sub_category_id') && $request->sub_category_id !=''){
          $request->sub_category_id = (array) $request->sub_category_id;
          $products = $products->whereIn('category_id',$request->sub_category_id);
      }
      if($request->has('brand_id') && $request->brand_id !=''){
          $request->brand_id = (array) $request->brand_id;
          $products = $products->whereIn('brand_id',$request->brand_id);
      }
      if($request->has('from') && $request->from !=''){
          $products = $products->where('price','>=',$request->from);
      }
      if($request->has('to') && $request->to!=''){
          $products = $products->where('price','<',$request->to);
      }
      if($request->has('from_to') && $request->from_to!=''){
        $products = $products->whereBetween('price',explode(',',$request->from_to));
      }
      if($request->has('ifrom') && $request->ifrom !=''){
          $products = $products->where('inch','>=',$request->ifrom);
      }
      if($request->has('ito') && $request->ito!=''){
          $products = $products->where('inch','=',$request->ito);
      }
      if($request->has('ifrom_ito') && $request->ifrom_ito!=''){
        $products = $products->whereBetween('inch',explode(',',$request->ifrom_ito));
      }
      if($request->has('search') && $request->search!=''){
        $products = $products->whereLike(['title'],$request->search);
      }
      if($request->has('offer') && $request->offer !=''){
        $products =  $products->orderBy('discount','desc');
      }
      if($request->has('sorted') && $request->sorted!=''){
        $products = $products->orderBy(explode(',',$request->sorted) [0],explode(',',$request->sorted) [1]);
      }
      if($request->has('last') && $request->last!=''){
        $products = $products->latest('created_at');
      }
      if($request->has('random') && $request->random!=''){
        $products = $products->inRandomOrder();
      }

      $products = $products->Paginate($per_page);
      $products->appends($request->all());
      return $products;
    }
}
