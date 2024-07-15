<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreProductRequest;
use App\Http\Requests\Dashboard\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;

use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  $products =Product::with('category')->get();
        return view("admin.product.index",compact("products"));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products =Product::all();
        $categories = Category::select('id','name')->get();
        return view("admin.product.create",compact(["products","categories"]));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request , Product $product)
    {
        $validated = $request->validated();
        try {
            $image = $request->file('image')->store('public/assets/uploads/Product');
            $product->create([
            'category_id' =>  $request->category_id,
            'name' =>  ['ar' => $request->name_ar, 'en' => $request->name_en],
            'slug' =>  $request->slug,
            'short_description' =>  ['ar' => $request->short_description_ar, 'en' => $request->short_description_en],
            'description' =>  ['ar' => $request->description_ar, 'en' => $request->description_en],
            'status' =>  $request->status ? '1' : '0',
            'trend' =>  $request->trend ? '1' : '0',
            'price' =>  $request->price,
            'selling_price' =>  $request->selling_price,
            'qty' =>  $request->qty,
            'tax' =>  $request->tax,
            'meta_title' =>  $request->meta_title,
            'meta_description' =>  ['ar' => $request->meta_description_ar, 'en' => $request->meta_description_en],
            'meta_keywords' =>  $request->meta_keywords,
            'image' =>  $image,

            ]);

            return to_route('products.index')->with('success', __('messages.success_save'));

        } catch (\Exception $e) {
            return redirect()->back()->with("error_catch", $e->getMessage());

        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view("admin.product.show",compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product ,Category $categories)
    {
        $categories = Category::select('id','name')->get();
        return view('admin.product.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated = $request->validated();

        $image = $product->image;
        try {
            if ($request->hasFile('image')) {
                Storage::delete($image);
                $image = $request->file('image')->store('public/assets/uploads/Product');
            }
                $product->update([
                //'category_id' =>  $request->category_id,
                'name' =>  ['ar' => $request->name_ar, 'en' => $request->name_en],
                'slug' =>  $request->slug,
                'short_description' =>  ['ar' => $request->short_description_ar, 'en' => $request->short_description_en],
                'description' =>  ['ar' => $request->description_ar, 'en' => $request->description_en],
                'status' =>  $request->status ? '1' : '0',
                'trend' =>  $request->trend ? '1' : '0',
                'price' =>  $request->price,
                'selling_price' =>  $request->selling_price,
                'qty' =>  $request->qty,
                'tax' =>  $request->tax,
                'meta_title' =>  $request->meta_title,
                'meta_description' =>  ['ar' => $request->meta_description_ar, 'en' => $request->meta_description_en],
                'meta_keywords' =>  $request->meta_keywords,
                'image' =>  $image,
                ]);
                return redirect()->route('products.index')->with('success',__("messages.success_update"));

            } catch (\Exception $e) {
                return redirect()->back()->with("error_catch", $e->getMessage());

            }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {


         Storage::delete($product->image);
         $product->delete();
         return response()->json(['status' => 'product has deleted successfully']);
    }
}
