<?php
/**
 * Created by PhpStorm.
 * Product: ghost
 * Date: 6/1/19
 * Time: 12:58 AM
 */

namespace App\Http\Services;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductServices
{
    /**
     * @var UploaderService
     */
    private $uploaderService;


    /**
     * ProductServices constructor.
     */
    public function __construct(UploaderService $uploaderService)
    {
        $this->uploaderService = $uploaderService;
    }

    public function fillProductFromRequest(Request $request, Product $product = null)
    {
        if (!$product) {
            $product = new Product();
        }

        // foreach ($request->title as $key => $value)
        // {
        //     $product->setTranslation('title', $key, $value);
        // }

        if($request->file('main_image')){
          $img = $this->uploaderService->upload($request->main_image, "product") ;
          $product->main_image = $img;
        }

        $product->fill($request->except('main_image','images'));

        $product->save();

        if ($request->file("images")) {
            $this->saveProductImages($request->file("images"), $product);
        }

        return $product;
    }

    public function saveProductImages($images, Product $product)
    {

        $productImages = [] ;

        foreach ($images as $image) {
            $img = $this->uploaderService->upload($image, "products");
            $productImages[] = new ProductImage(["image" => $img]);

        }

        $product->gallery()->saveMany($productImages);
    }
}
