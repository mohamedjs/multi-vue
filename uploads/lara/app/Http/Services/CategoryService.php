<?php


namespace App\Http\Services;


use App\Models\Category;
use Symfony\Component\HttpFoundation\Request;

class CategoryService
{
    public function __construct(UploaderService $uploaderService)
    {
        $this->uploaderService = $uploaderService;
    }

    public function fill(Request $request, Category $category = null)
    {
        if (!$category) {
            $category = new Category();
        }

        $category->fill($request->request->all());
        $category->active = $request->request->get("active", 0);

        if ($request->hasFile("image")) {
            $category->image = $this->uploaderService->upload($request->file("image"), "categories");
        }

        $category->save();

        return $category;
    }

}
