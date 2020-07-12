<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\BlogUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\BlogCategoryRepository;
use App\Repositories\BlogRepository;
use App\Http\Requests\Admin\BlogRequest;
use Illuminate\Support\Facades\Storage;


class BlogController extends Controller
{
    public $title = 'Blog';


    /**
     * The Blog Category repository implementation.
     *
     * @var BlogCategoryRepository
     */
    protected $category;

    /**
     * The Blog repository implementation.
     *
     * @var BlogRepository
     */
    protected $blog;

    /**
     * Create a new controller instance.
     *
     * @param  BlogCategoryRepository $category
     * @param  BlogRepository $blog
     */
    public function __construct(
        BlogCategoryRepository $category,
        BlogRepository $blog

    )
    {
        $this->category = $category;
        $this->blog = $blog;
        auth()->shouldUse('admin');
        $this->upload_path = DIRECTORY_SEPARATOR.'blog'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }

    public function index(Request $request)
    {
        auth()->user()->can('master-policy.perform',['blog', 'view']);
        $title = $this->title;
        $perpage ='100';
        $blogs = $this->blog->orderBy('created_at','desc')->paginate($perpage);
        return view('admin..blog.blog.index')->withTitle($title)->withBlogs($blogs);
    }

    public function create()
    {
        auth()->user()->can('master-policy.perform',['blog', 'add']);
        $title = 'Add Blog';
        $category = $this->category->where('is_active','1')->orderBy('name')->get();
        return view('admin..blog.blog.create')->withTitle($title)->withCategory($category);
    }

    public function store(BlogRequest $request)
    {
        auth()->user()->can('master-policy.perform',['blog', 'add']);

        $data = $request->except(['image']);
        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'blog/'.$fileName;

        }
        $data['is_active'] = isset($request['is_active']) ? 1 : 0;

        $data['created_by'] = auth()->user()->id;
        if($this->blog->create($data)){
            return redirect()->route('admin.blog.index')
                ->with('flash_notice', 'Blog Created Successfully.');
        }

        return redirect()->route()->withInput()
            ->with('flash_notice', 'Blog can not be Create.');
    }

    public function changeStatus(Request $request)
    {
        auth()->user()->can('master-policy.perform',['blog', 'changeStatus']);
        $blog = $this->blog->find($request->get('id'));
        if ($blog->is_active == 0) {
            $status = 1;
            $message = 'Blog with titl "' . $blog->title . '" is published.';
        } else {
            $status = 0;
            $message = 'Blog with title "' . $blog->title . '" is unpublished.';
        }

        $this->blog->changeStatus($blog->id, $status);
        $updated = $this->blog->find($request->get('id'));
        return response()->json(['status' => 'ok', 'message' => $message, 'response' => $updated], 200);
    }

    public function destroy(Request $request)
    {
        auth()->user()->can('master-policy.perform',['blog', 'delete']);
        $this->validate($request, [
            'id' => 'required|exists:blogs,id',
        ]);
        $blog = $this->blog->find($request->get('id'));
        $this->blog->destroy($blog->id);
        $message = 'Your blog deleted successfully.';
        return response()->json(['status' => 'ok', 'message' => $message], 200);
    }

    public function edit(Request $request, $id)
    {
        auth()->user()->can('master-policy.perform',['blog', 'edit']);
        $title = 'Edit Blog';
        $category = $this->category->where('is_active','1')->orderBy('name')->get();

        $blog = $this->blog->find($id);
        return view('admin.blog.blog.edit', compact('title', 'category', 'blog'));

    }

    public function update(BlogUpdateRequest $request, $id)
    {
        auth()->user()->can('master-policy.perform',['blog', 'edit']);
        $data = $request->except(['image']);
        $blog = $this->blog->find($id);
        if($request->file('image')){
            $image= $request->file('image');
            $fileName = time().$image->getClientOriginalName();
            $this->storage->put($this->upload_path. $fileName, file_get_contents($image->getRealPath()));
            $data['image'] = 'blog/'.$fileName;

        }
        $data['is_active'] = isset($request['is_active']) ? 1 : 0;
        $data['slug'] =str_slug($request->title);
        $data['updated_by'] = auth()->user()->id;
        if($this->blog->update($blog->id, $data)){
            return redirect()->route('admin.blog.index')
                ->with('flash_notice', 'Blog Updated Successfully.');
        }

        return redirect()->route('admin.blog.blog.index')
            ->with('flash_notice', 'Blog can not be Updated .');
    }


}
