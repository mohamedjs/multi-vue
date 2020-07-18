<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Repository\CategoryRepository;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends APIController
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * CategoryController constructor.
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index(Request $request)
    {
        $categories = $this->categoryRepository->search($request)
        ->select("id", 'name', "image")
        ->get();

        return $this->OK($categories);
    }

    public function show(Category $category)
    {
        return $this->OK($category);
    }

}
