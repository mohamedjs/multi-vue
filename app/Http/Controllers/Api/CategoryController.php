<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use App\Category;
use App\Http\Requests\Api\CategoryRequest;
use App\Http\Repository\CategoryRepository;
use App\Http\Services\CategoryServices;

class CategoryController extends Controller
{
  /**
   * @var categoryServices
   */
  private $categoryServices;
  /**
   * @var categoryRepository
   */
  private $categoryRepository;

  public function __construct(CategoryRepository $categoryRepository ,CategoryServices $categoryServices)
  {
      $this->categoryRepository = $categoryRepository  ;
      $this->categoryServices   = $categoryServices    ;
  }

  public function index(Request $request)
  {
    $categorys = $this->categoryRepository->CategoryWithFiltration(request());
    $data['categorys'] = $categorys;
    return response()->json(['status' => 'success' , 'data' => $data , 'message' => 'Get All Category']);
  }

  public function store(CategoryRequest $request)
  {
    $category = $this->categoryServices->fillCategoryFromRequest($request);
    return response()->json(['data' => $category , 'status' => 'success' , 'message' => 'Category Added Successfully']);
  }

  public function edit($id)
  {
    $category = Category::with('cat')->where('id',$id)->first();
    return response()->json(['status' => 'success' , 'data' => $category , 'message' => 'Get Category For Edit Success']);
  }

  public function update(CategoryRequest $request,Category $category)
  {
    $category = $this->categoryServices->fillCategoryFromRequest($request,$category);
    return response()->json(['status' => 'success' , 'data' => $category , 'message' => 'Update Category SuccessFully']);
  }

  public function destroy($id)
  {
    $category = Category::find($id)->delete();
    return response()->json(['status' => 'success' , 'data' => (object)[] , 'message' => 'Delete Category SuccessFully']);
  }
}
