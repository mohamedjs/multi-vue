<?php
namespace App\Http\Controllers\Api\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
use App\User;
use App\Http\Repository\ProductRepository;
use App\Http\Repository\CategoryRepository;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\CategoryCollection;
use Validator;
class HomeController extends Controller
{
  /**
   * @var productRepository
   */
  private $productRepository;
  private $categorytRepository;

  public function __construct(ProductRepository $productRepository, CategoryRepository $categorytRepository)
  {
      $this->productRepository = $productRepository  ;
      $this->categorytRepository = $categorytRepository  ;
  }


  public function index(Request $request)
  {
    $req = new \Illuminate\Http\Request();
    $req->replace(['seller' => 'seller']);
    $req->replace(['latest' => 'latest']);
    $latest_product  = $this->productRepository->ProductWithFiltration($req);
    $popular_product = $this->productRepository->ProductWithFiltration($req);
    $categorys       = $this->categorytRepository->CategoryWithFiltration(request());
    $data['categorys']       = new CategoryCollection($categorys);
    $data['latest_product']  = new ProductCollection($latest_product);
    $data['popular_product'] = new ProductCollection($popular_product);

    return response()->json(['message' => 'ger hhome data' , 'status' => 'success' , 'data' => $data]);
  }
}
