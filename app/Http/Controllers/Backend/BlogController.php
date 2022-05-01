<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Traits\UploadImageTrait;
use App\Http\Requests\Blog\AddRequest;
use App\Traits\DeleteModelTrait;
use App\Http\Requests\Blog\EditRequest;
use Illuminate\Support\Str;


class BlogController extends Controller
{
    use UploadImageTrait, DeleteModelTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('blog-view');

        $blogs = Blog::latest()->paginate(5);
        return view('back-end.admin.blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('blog-create');

        return view('back-end.admin.blog.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddRequest $request)
    {
        $this->authorize('blog-create');

        $data = [
            'title' => $request->title,
            'slug'  => Str::slug($request->title),
            'content' => $request->content,
            'user_id' => auth()->id()
        ];
        $imageUpload = $this->imageUploadStorage($request,'image_path','blog');
        if(!empty($imageUpload)){
            $data['image_path'] = $imageUpload['file_path_master'];
            $data['image_name'] = $imageUpload['file_name_master'];
        }

        Blog::create($data);

        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id);
        return view('back-end.admin.blog.show',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        $this->authorize('blog-update',$blog);
       
        return view('back-end.admin.blog.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, $id)
    {
        $blog = Blog::find($id);
        $this->authorize('blog-update',$blog);

        $data = [
            'title' => $request->title,
            'slug'  => Str::slug($request->title),
            'content' => $request->content,
            'user_id' => auth()->id()
        ];

        $imageUpload = $this->imageUploadStorage($request,'image_path','blog');

        if(!empty($imageUpload)){
            $data['image_path'] = $imageUpload['file_path_master'];
            $data['image_name'] = $imageUpload['file_name_master'];
        }

        $blog->update($data);

        return back()->with('success','Blog updates the data successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return  $this->deleteModel($id, Blog::class,'blog-delete');
    }
}
