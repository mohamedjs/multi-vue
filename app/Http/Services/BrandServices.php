<?php
/**
 * Created by PhpStorm.
 * Brand: ghost
 * Date: 6/1/19
 * Time: 12:58 AM
 */

namespace App\Http\Services;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandServices
{
    /**
     * @var UploaderService
     */
    private $uploaderService;


    /**
     * BrandServices constructor.
     */
    public function __construct(UploaderService $uploaderService)
    {
        $this->uploaderService = $uploaderService;
    }

    public function fillBrandFromRequest(Request $request, Brand $brand = null)
    {
        if (!$brand) {
            $brand = new Brand();
        }
        foreach ($request->title as $key => $value)
        {
            $brand->setTranslation('title', $key, $value);
        }
        if($request->has('image')){
          $img = $this->uploaderService->upload($request->image, "brands") ;
          $brand->image = $img;
        }
        $brand->save();

        return $brand;
    }
}
