<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category;
use App\Models\Tag;
use App\Components\CategoryRecusive;
use App\Traits\DeleteModelTrait;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Str;
use App\Http\Requests\Product\AddRequest;
use App\Http\Requests\Product\EditRequest;


class ProductController extends Controller
{

    use UploadImageTrait, DeleteModelTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->authorize('product-view');

        $products = Product::latest()->paginate(10);
        return view('back-end.admin.product.index',compact('products'));
    }

    // get All Category Recusive html option 
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
        $this->authorize('product-create');
        
        $html_option = $this->getCategory($parent_id = '');
        return view('back-end.admin.product.add',compact('html_option'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddRequest $request)
    {
        $this->authorize('product-create');
        
        $dataInsertProduct = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'price' => $request->price,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'user_id' => auth()->id(),
        ];



        $dataImageUpload = $this->imageUploadStorage($request, 'image_path_master', 'products');

        if(!empty($dataImageUpload)){
            $dataInsertProduct['image_path_master'] = $dataImageUpload['file_path_master'];
            $dataInsertProduct['image_name_master'] = $dataImageUpload['file_name_master'];
        }
        // insert data product table

        $product = Product::create($dataInsertProduct);

        // insert data product_image table
        if($request->hasFile('image_path')){
            foreach ($request->image_path as $img) {
                $dataImageUploadMultiple = $this->imageMultipleUploadStorage($img, 'products');
                $product->images()->create([
                    'image_path' => $dataImageUploadMultiple['file_path'],
                    'image_name' => $dataImageUploadMultiple['file_name']
                ]);
            }
        };

        //  insert tags table
        $tagId = [];
        if(!empty($request->tags)){
            foreach ($request->tags as $tag) {
                // Check Tag Name đã có trong db chưa, nếu có rồi thì không add nữa 
                $tagIntance = Tag::firstOrCreate(['name'=> $tag]);
                $tagId[] = $tagIntance->id;
            }
        }
        // Sử dụng method attach() để thêm tag id vào bảng trung gian product_tag và thêm tag name vào bảng tag for products
        $product->tags()->attach($tagId);
        return redirect()->route('product.index');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('back-end.admin.product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $this->authorize('product-update',$product);

        $html_option = $this->getCategory($product->category_id);
        return view('back-end.admin.product.edit', compact('html_option', 'product'));
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
        $product_detail = Product::find($id);
        $this->authorize('product-update',$product_detail);

        $dataUpdateProduct = [
            'name' => $request->name,
            'price' => $request->price,
            'content' => $request->content,
            'user_id' => auth()->id(),
            'category_id' => $request->category_id
        ];

        $dataImageUpload = $this->imageUploadStorage($request, 'image_path_master', 'products');

        if(!empty($dataImageUpload)){
            $dataInsertProduct['image_path_master'] = $dataImageUpload['file_path_master'];
            $dataInsertProduct['image_name_master'] = $dataImageUpload['file_name_master'];
        }
        // Update data product table
        $product = $product_detail->update($dataUpdateProduct);
        // Update data to Product Images Table

        if($request->hasfile('image_path')){
            ProductImage::where('product_id',$id)->delete();
            foreach ($request->image_path as $img) {
                $dataProductImagesDetailUpload = $this->imageMultipleUploadStorage($img,'products');
                $product_detail->images()->create([
                    'image_path' => $dataProductImagesDetailUpload['file_path'],
                    'image_name' => $dataProductImagesDetailUpload['file_name']
                ]);
            }
        }

        // Update Tags For Product
        $tagId = [];
        if(!empty($request->tags)){
            foreach ($request->tags as $tag) {
                // Check Tag Name đã có trong db chưa, nếu có rồi thì không add nữa 
                $tagIntance = Tag::firstOrCreate(['name'=> $tag]);
                $tagId[] = $tagIntance->id;
            }
        }
        // Sử dụng method sync() để update tag or nếu tagId = null thì remove tag id old for products 
        $product_detail->tags()->sync($tagId);
        return back()->with('success', 'Product updates the data successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return  $this->deleteModel($id, Product::class,'product-delete');
    }

}
