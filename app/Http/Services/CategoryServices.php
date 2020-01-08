<?php
/**
 * Created by PhpStorm.
 * Category: ghost
 * Date: 6/1/19
 * Time: 12:58 AM
 */

namespace App\Http\Services;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryServices
{
    /**
     * @var UploaderService
     */
    private $uploaderService;


    /**
     * CategoryServices constructor.
     */
    public function __construct(UploaderService $uploaderService)
    {
        $this->uploaderService = $uploaderService;
    }

    public function fillCategoryFromRequest(Request $request, Category $category = null)
    {
        if (!$category) {
            $category = new Category();
        }
        $data = $request->all();
        if($request->has('image')){
          $img = $this->uploaderService->upload($request->image, "categorys") ;
          $data = $request->except(['image']);
          $data['image'] = $img;
        }
        $category->fill($data);
        $category->save();

        return $category;
    }
}
