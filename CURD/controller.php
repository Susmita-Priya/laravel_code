<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products =  product :: all();

        return view('product_list',
        ['products' => $products]
        );
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required', 
                'price' => 'required',
                'quantity' => 'required'
            ]
        );

        if ($request->has('image')) {
            $file = $request->file('image');
            $filename = time() . "product." . $file->getClientOriginalExtension();
            $path = 'uploads'; 
            $file->move(public_path($path), $filename); // Move to 'public/uploads' directly
            $fullPath = $path . '/' . $filename; 
        } else {
            $fullPath = null; 
        }

        $product = new product;
        $product -> id = $request['id'];
        $product -> title = $request['title'];
        $product -> price = $request['price'];
        $product -> quantity = $request['quantity'];
        $product -> description = $request['description'];
        $product -> image = $fullPath;
        
        $product -> save();

        // return back()-> with('success',"Registration successfull ! ");
        return redirect('product')->with('success',"Product add successfull ! ");
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = product::find($id);
         if(is_null($product)){
            return redirect('/product');
         }else{
            $data = compact('product');
            return view('product_edit')->with($data);
         }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate(
            [
                'title' => 'required', 
                'price' => 'required',
                'quantity' => 'required'
            ]
        );

        $product = product::find($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . "product." . $file->getClientOriginalExtension();
            $path = 'uploads';
            $file->move(public_path($path), $filename);
            $fullPath = $path . '/' . $filename;
    
            // If a new image is uploaded, delete the old one
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }

            $product->image = $fullPath; // Update with new image path
        }

        $product -> title = $request['title'];
        $product -> price = $request['price'];
        $product -> quantity = $request['quantity'];
        $product -> description = $request['description'];
        $product -> save();

        // return back()-> with('success',"Registration successfull ! ");
        return redirect('product')->with('update',"Update Successfull ! ");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = product::find($id);
        if(!is_null($product)){
            $product->delete();
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }
        }
            
        return redirect('product')->with('delete',"Delete Successfull ! ");
    }
}
