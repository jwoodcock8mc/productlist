<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;

class ImageUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function imageUpload(Product $product)
    {
        return view('products.imageUpload',compact('product'));
    }

    /**
     * Post the image to the public/images directory.
     *
     * @return \Illuminate\Http\Response
     */

    public function imageUploadPost(Product $product)
    {
        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);

        $product->image_name = $imageName;
        $product->save();
        return back()
            ->with('success','You have successfully uploaded an image.')
            ->with('image',$imageName);
    }

}