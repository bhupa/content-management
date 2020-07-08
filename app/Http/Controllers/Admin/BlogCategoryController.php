<?php

namespace App\Http\Controllers\Admin;

use Image;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use App\Http\Controllers\Controller;
use App\Repositories\BlogCategoryRepository;
use App\Http\Requests\Admin\BlogCategoryRequest;


class BlogCategoryController extends Controller
{
    public $title = 'Blog Category';
    /**
     * The BlogCategoryRepository implementation.
     *
     * @var $blogCategory
     */
    protected $blogCategory;

    /**
     * Create a new controller instance.
     *
     * @param  BlogCategoryRepository $blogCategory
     */
    public function __construct(BlogCategoryRepository $blogCategory)
    {
        $this->blogCategory = $blogCategory;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $title = $this->title;
        $categories = $this->blogCategory->all();
        return view('admin.blog.category.index', compact('title', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $title = 'Create Category';
        return view('admin.blog.category.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(BlogCategoryRequest $request)
    {
        $data = $request->all();
        $data['is_active'] = (isset($data['is_active']) && $data['is_active'] != 0) ? 1 : 0;
        $this->blogCategory->create($data);
        return redirect()->route('admin.blog.category.index')
            ->with('flash_notice', 'Blog category created successfully.');

    }

    public function changeStatus(Request $request)
    {
        $category = $this->blogCategory->find($request->get('id'));
        if ($category->is_active == 0) {
            $status = 1;
            $message = 'Category with name "' . $category->name . '" is published.';
        } else {
            $status = 0;
            $message = 'Category with name "' . $category->name . '" is unpublished.';
        }
        $this->blogCategory->changeStatus($category->id, $status);
        $updated = $this->blogCategory->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'response' => $updated], 200);
    }

    public function destroy(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:blog_categories,id',
        ]);
        $category = $this->blogCategory->find($request->get('id'));
        $this->blogCategory->destroy($category->id);
        $message = 'Blog category is deleted successfully.';
        return response()->json(['status' => 'ok', 'message' => $message], 200);
    }

    public function edit($id)
    {
        $title = 'Edit Category';
        $category = $this->blogCategory->find($id);
        return view('admin.blog.category.edit', compact('title', 'category'));
    }

    public function update(BlogCategoryRequest $request, $id)
    {
        $data = $request->all();
        $category = $this->blogCategory->find($id);
        $data['is_active'] = (isset($data['is_active']) && $data['is_active'] != 0) ? 1 : 0;
        $this->blogCategory->update($category->id, $data);
        return redirect()->route('admin.blog.category.index')
            ->with('flash_notice', 'Blog category updated successfully.');
    }

}
