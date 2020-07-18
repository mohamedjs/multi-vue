<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repository\CategoryRepository;
use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Services\CategoryService;
use App\Models\Category;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;
    /**
     * @var CategoryService
     */
    private $categoryService;

    /**
     * CategoryController constructor.
     * @param CategoryRepository $categoryRepository
     * @param CategoryService $categoryService
     */
    public function __construct(CategoryRepository $categoryRepository, CategoryService $categoryService)
    {
        $this->categoryRepository = $categoryRepository;
        $this->categoryService = $categoryService;
    }

    /**
     * @param Request $request
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function index(Request $request)
    {
        $this->authorize("index", Category::class);
        $list = $this->categoryRepository->search($request)
                ->orderByDesc("id")
                ->paginate(10);

        return view("admin.categories.index", compact("list"));
    }

    /**
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize("create", Category::class);
        return view("admin.categories.create");
    }

    /**
     * @param CategoryRequest $request
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function store(CategoryRequest $request)
    {
        $this->authorize("create", Category::class);

        $this->categoryService->fill($request);

        return redirect()->route("admin.categories.index")->with("success", "Item Added Successfully");
    }

    /**
     * @param Category $category
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function edit(Category $category)
    {
        $this->authorize("update", $category);

        return view("admin.categories.edit", compact("category"));
    }

    /**
     * @param CategoryRequest $request
     * @param Category $category
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $this->authorize("update", $category);

        $this->categoryService->fill($request, $category);

        return redirect()->route("admin.categories.index")->with("success", "Item Updated Successfully");
    }

    /**
     * @param Category $category
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(Category $category)
    {
        $this->authorize("delete", $category);
        $category->delete();

        return back()->with("success", "Item Deleted Successfully");
    }
}
