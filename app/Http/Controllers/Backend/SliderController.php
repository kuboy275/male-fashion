<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Traits\UploadImageTrait;
use App\Http\Requests\Slider\AddRequest;
use App\Traits\DeleteModelTrait;
use App\Http\Requests\Slider\EditRequest;

class SliderController extends Controller
{
    use UploadImageTrait,DeleteModelTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('slider-view');

        $sliders = Slider::latest()->paginate(5);
        return view('back-end.admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('slider-create');

        return view('back-end.admin.slider.add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddRequest $request)
    {
        $this->authorize('slider-create');

        $data = [
            'name' => $request->name,
            'description' => $request->description
        ];

        $imageUpload = $this->imageUploadStorage($request,'image_path','slider');

        if(!empty($imageUpload)){
            $data['image_path'] = $imageUpload['file_path_master'];
            $data['image_name'] = $imageUpload['file_name_master'];
        }

        Slider::create($data);
        
        return redirect()->route('slider.index');

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
        $slider = Slider::find($id);
        $this->authorize('slider-update',$slider);

        // dd($slider);
        return view('back-end.admin.slider.edit',compact('slider'));
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
        $slider = Slider::find($id);
        $this->authorize('slider-update',$slider);

        $data = [
            'name' => $request->name,
            'description' => $request->description
        ];

        $imageUpload = $this->imageUploadStorage($request,'image_path','slider');

        if(!empty($imageUpload)){
            $data['image_path'] = $imageUpload['file_path_master'];
            $data['image_name'] = $imageUpload['file_name_master'];
        }

        $slider->update($data);
        
        return back()->with('success','Slider updates the data successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        return  $this->deleteModel($id, Slider::class,'slider-delete');
    }
}
