<?php
namespace App\Http\Controllers\Api\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
use App\User;
use App\Models\UserAddress;
use App\Models\City;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Http\Repository\ProductRepository;
use App\Http\Repository\CategoryRepository;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
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
    $req1 = new \Illuminate\Http\Request();
    $req1->replace(['latest' => 'latest']);
    $latest_product  = $this->productRepository->ProductWithFiltration($req1);
    $req2 = new \Illuminate\Http\Request();
    $req2->replace(['seller' => 'seller']);
    $popular_product = $this->productRepository->ProductWithFiltration($req2);
    $categorys       = $this->categorytRepository->CategoryWithFiltration(request());
    $data['categorys']       = new CategoryCollection($categorys);
    $data['latest_product']  = new ProductCollection($latest_product);
    $data['popular_product'] = new ProductCollection($popular_product);

    return response()->json(['message' => 'Get Home Data' , 'status' => 'success' , 'data' => $data]);
  }

  public function products(Request $request)
  {
    $products  = $this->productRepository->ProductWithFiltration(request());
    $data['products']  = new ProductCollection($products);
    return response()->json(['message' => 'Product Data' , 'status' => 'success' , 'data' => $data]);
  }

  public function show($id)
  {
    $product = new ProductResource(Product::where('id',$id)->first());
    return response()->json(['status' => 'success' , 'data' => $product , 'message' => 'Get Product Data Success']);
  }

  public function make_order(Request $request)
  {
       $validator = Validator::make($request->all(), [
           'city_id' => 'required',
           'address' => 'required',
           'payment' => 'required',
           'carts' => 'required|array'
       ]);
       if ($validator->fails()) {
           return response()->json(['data' => $validator->errors()->all() , 'status' => 'error' , 'message' => 'Error In Data']);
       }
       $address = UserAddress::create(['city_id' => $request->city_id, 'user_id' => \Auth::user()->id, 'address' => $request->address]);
       $city = City::find($request->city_id);
       $total_price = array_sum(array_column($request->carts, 'total_price'));
       $count_coupon = 0;
       $coupons = Coupon::where('user_id',\Auth::user()->id)->where('used',1)->get();
       foreach($coupons as $coupon){
           $count_coupon += $coupon->value;
           $coupon->used = 2;
           $coupon->save();
       }
       $order = Order::create([
           'user_id' => \Auth::user()->id,
           'address_id' =>$address->id,
           'shipping_amount' =>$city->shipping_amount,
           'total_price' =>  ($total_price + $city->shipping_amount)-$count_coupon,
           'lang' => getCode(),
           'payment' => $request->payment
       ]);
       foreach($request->carts as $cart){
           $detail = OrderDetail::create([
               'order_id'    => $order->id,
               'product_id'  => $cart['product_id'],
               'quantity'    => $cart['quantity'],
               'price'       => $cart['price'],
               'total_price' => $cart['total_price'],
           ]);
       }
       //$client = \Auth::user();
       // \Mail::send('front.mail', ['order' => $order , 'client' => $client], function ($m) use ($client) {
       //     $m->from($client->email, __('front.order'));
       //     $m->to(setting('super_mail'), __('front.title'))->subject(__('front.order'));
       // });
       // $link = url('order/'.$order->id);
       // send_notification(' Make New order  #'.$order->id.' ',\Auth::user()->id,$link);
       return response()->json(['data' => $order , 'status' => 'success' , 'message' => 'Order Added Successfully']);
   }

  public function add_rate(Request $request)
  {
       $validator = Validator::make($request->all(), [
           'product_id' => 'required',
           'rate' => 'required',
           'comment' => 'required',
       ]);

       if ($validator->fails()) {
           return response()->json(['data' => $validator->errors()->all() , 'message' => 'error in data' , 'status' => 'error']);
       }

       $client_rate = \App\Models\UserRate::create([
           'product_id' => $request->product_id,
           'user_id' => \Auth::user()->id,
           'rate' => $request->rate,
           'publish' => 0,
           'comment'=> $request->comment

       ]);
       return response()->json(['data' => $client_rate , 'status' => 'success' , 'message' => 'Rate Added Successfully']);
   }

  public function updated_address(Request $request,$id)
  {
        $validator = Validator::make($request->all(), [
            'address' => 'required',
            'city_id' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['data' => $validator->errors()->all(), 'status' => 'error' , 'message' => 'Error In Data']);
        }
        $client_address = UserAddress::find($id);
        if(!$client_address){
          return response()->json(['data' => (object)[], 'status' => 'error' , 'message' => 'Error In Data']);
        }
        $addresses = $client_address->update($request->all());
        return response()->json(['status' => 'success' , 'data' => $client_address,  'message' => 'Update Address Successfully']);
    }

  public function add_address(Request $request)
  {
        $validator = Validator::make($request->all(), [
            'city_id' => 'required',
            'address' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['data' => $validator->errors()->all(), 'status' => 'error' , 'message' => 'Error In Data']);
        }
        $address = UserAddress::create(['city_id' => $request->city_id, 'user_id' => auth()->user()->id, 'address' => $request->address]);
        return response()->json(['data' => $address, 'status' => 'success' , 'message' => 'Add Address Successfully']);
    }

}
