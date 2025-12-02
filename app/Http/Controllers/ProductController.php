<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;;
class ProductController extends Controller
{

    public function index()
    {
        $products  = Product::all();
        return view('products.index',['products'=>$products]);
    }
    public function AddProduct()
    {
        return view('products.addForm');
    }
      public function AddProductForm(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        Product::create($validated);
        return redirect()->route('products.index');
    }
      public function EditForm($id)
    {
        try
        {
          $data=   Product::where('id',$id)->first();
          return view('products.editForm',['data'=>$data]);
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }

    }

       public function update(Request $request)
    {
        try
        {
            $id = $request->input('id');
        $validated = $request->validate([
                'name' => 'required',
                'description' => 'required',
                'price' => 'required',
            ]);


            $pro = Product::findOrFail($id);
            $pro->update($validated); ;
            return redirect()->route('products.index');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }

    }
           public function delete(Request $request,$id=0)
    {
        try
        {
            $pro = Product::findOrFail($id);
            $pro->delete();
            return redirect()->route('products.index');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }

    }


    
    
    
}
