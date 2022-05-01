<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Components\CategoryRecusive;
use App\Traits\DeleteModelTrait;
use Illuminate\Support\Str;
use App\Http\Requests\Category\AddRequest;
use App\Http\Requests\Category\EditRequest;

class CategoryController extends Controller
{

    use DeleteModelTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('category-view');

        $categories = Category::latest()->paginate(5);
        return view('back-end.admin.category.index', compact('categories'));
    }


    public function getCategory($parent_id){
        $data = Category::all();
        $recusive = new CategoryRecusive($data);
        $html_option = $recusive->categoryRecusive($parent_id);
        return $html_option;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('category-create');

        $html_option = $this->getCategory($parent_id = '');
        return view('back-end.admin.category.add',compact('html_option'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddRequest $request)
    {
        $this->authorize('category-create');

        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name,'-'),
            'parent_id' => $request->parent_id
        ];

        Category::create($data);

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $category = Category::find($id);
        $this->authorize('category-update',$category);


        $html_option = $this->getCategory($parent_id = $category->parent_id);
        return view('back-end.admin.category.edit',compact('html_option','category'));
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
        $category = Category::find($id);
        $this->authorize('category-update',$category);

        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name,'-'),
            'parent_id' => $request->parent_id            
        ];

        if($data['parent_id'] == $id){
            return back()->with("success","Can't choose the category itself as the parent category");
        }
        $category->update($data);

        return back()->with('success','Category updates the data successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return  $this->deleteModel($id, Category::class,'category-delete');
    }
}
