<?php

namespace App\Http\Controllers\Admin;

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
    }

    public function index(Request $request)
    {
        $this->authorize('master-policy.perform',['blog', 'view']);
        $title = $this->title;
        $perpage ='100';
        $blogs = $this->blog->paginate($perpage);
        return view('admin..blog.blog.index')->withTitle($title)->withBlogs($blogs);
    }

    public function create()
    {
        $this->authorize('master-policy.perform',['blog', 'add']);
        $title = 'Add Blog';
        $category = $this->category->lists();
        return view('admin..blog.blog.create')->withTitle($title)->withCategory($category);
    }

    public function store(BlogRequest $request)
    {
        $this->authorize('master-policy.perform',['blog', 'add']);

        $data = $request->except(['image']);
        if($request->get('image')){
            $saveName = sha1(date('YmdHis').str_random(3));
            $image = $request->get('image');
            $image = str_replace('data:image/png;base64','',$image);
            $image= str_replace('','+',$image);
            $imageData= base64_decode($image);
            $data['image'] = 'blog/'.$saveName.'.png';
            Storage::put($data['image'],$imageData);
        }
        $data['is_active'] = isset($request['is_active']) ? 1 : 0;
        $data['slug'] =str_slug($request->title);
        if($this->blog->create($data)){
            return redirect()->route('admin.blog.index')
                ->with('flash_notice', 'Blog Created Successfully.');
        }

        return redirect()->route()->withInput()
            ->with('flash_notice', 'Blog can not be Create.');
    }

    public function changeStatus(Request $request)
    {
        $this->authorize('master-policy.perform',['blog', 'changeStatus']);
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
        $this->authorize('master-policy.perform',['blog', 'delete']);
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
        $this->authorize('master-policy.perform',['blog', 'edit']);
        $title = 'Edit Blog';
        $category = $this->category->lists();
        $blog = $this->blog->find($id);
        return view('admin.blog.blog.edit', compact('title', 'category', 'blog'));

    }

    public function update(BlogRequest $request, $id)
    {
        $this->authorize('master-policy.perform',['blog', 'edit']);
        $data = $request->except(['image']);
        $blog = $this->blog->find($id);
        if($request->get('image')){
            $saveName = sha1(date('YmdHis').str_random(3));
            $image = $request->get('image');
            $image = str_replace('data:image/png;base64','',$image);
            $image= str_replace('','+',$image);
            $imageData= base64_decode($image);
            $data['image'] = 'blog/'.$saveName.'.png';
            Storage::put($data['image'],$imageData);
            if(Storage::exists($blog->image)){
                Storage::delete($blog->image);
            }
        }
        $data['is_active'] = isset($request['is_active']) ? 1 : 0;
        $data['slug'] =str_slug($request->title);
        if($this->blog->update($blog->id, $data)){
            return redirect()->route('admin.blog.index')
                ->with('flash_notice', 'Blog Updated Successfully.');
        }

        return redirect()->route('admin.blog.blog.index')
            ->with('flash_notice', 'Blog can not be Updated .');
    }


}
