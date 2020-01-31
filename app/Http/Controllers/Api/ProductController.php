<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use App\Models\Product;
use App\Models\ProductImage;
use App\Http\Requests\Api\ProductRequest;
use App\Http\Repository\ProductRepository;
use App\Http\Services\ProductServices;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;
class ProductController extends Controller
{
  /**
   * @var productServices
   */
  private $productServices;
  /**
   * @var productRepository
   */
  private $productRepository;

  public function __construct(ProductRepository $productRepository ,ProductServices $productServices)
  {
      $this->productRepository = $productRepository  ;
      $this->productServices   = $productServices    ;
  }

  public function index(Request $request)
  {
    $products = $this->productRepository->ProductWithFiltration(request());
    $data['products'] = new ProductCollection($products);
    return response()->json(['status' => 'success' , 'data' => $data , 'message' => 'Get All Product']);
  }

  public function store(ProductRequest $request)
  {
    $product = $this->productServices->fillProductFromRequest($request);
    return response()->json(['data' => $product , 'status' => 'success' , 'message' => 'Product Added Successfully']);
  }

  public function edit($id)
  {
    $product = new ProductResource(Product::where('id',$id)->first());
    return response()->json(['status' => 'success' , 'data' => $product , 'message' => 'Get Product For Edit Success']);
  }

  public function update(ProductRequest $request,Product $product)
  {
    $product = $this->productServices->fillProductFromRequest($request,$product);
    return response()->json(['status' => 'success' , 'data' => $product , 'message' => 'Update Product SuccessFully']);
  }

  public function destroy($id)
  {
    $product = Product::find($id)->delete();
    return response()->json(['status' => 'success' , 'data' => (object)[] , 'message' => 'Delete Product SuccessFully']);
  }

  public function deleteImage($id)
  {
    $image = ProductImage::find($id);
    if(!$image){
      return response()->json(['status' => 'error' , 'data' => (object)[] , 'message' => 'Delete Product SuccessFully']);
    }
    $image->delete();
    return response()->json(['status' => 'success' , 'data' => (object)[] , 'message' => 'Delete Gallery Image SuccessFully']);
  }
}
