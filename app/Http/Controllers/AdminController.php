<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\order;

use PDF;

class AdminController extends Controller
{
    //
    //View Category 
    public function view_category(){
        $data=Category::all();
        
        return view('admin.view_category',compact('data'));
    }
    
    public function add_category(Request $request)
    {
       $data=new category;
       
       $data->category_name=$request->name;
       
       $data->save();
       
       return redirect()->back()->with('message','Category Add Successfully!'); 
    }
    
    public function delete_category($id)
    {
        $category=category::find($id);
        
        $category->delete();
        
        return redirect()->back()->with('message','Delete Successful!');
    }
    
    /*
    Product function
    */
    public function AddNewProducts()
    {        $category=category::all();
    
        return view('admin.add_products',compact('category'));
    }
    public function Add_Product(Request $request)
    {
        $product=new product;
        
        $product->title=$request->title;
        
        $product->description=$request->description;
        
        $product->price=$request->price;
        
        $product->quantity=$request->quantity;
        
        $product->discount=$request->discount;
        
        $product->category=$request->category;
        
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        
        $request->image->move('product_image',$imagename);
        
        $product->image=$imagename;
        
        $product->save();
        
        return redirect()->back()->with('message','Product Added Successfully');
    }
    
    /*
     Show Product Function
    */
    public function ShowProduct()
    {
        $product=product::all();
        
        return view('admin.show_products',compact('product'));
    }
    
    /*
      Delete Product
    */
    public function DeleteProduct($id)
    {
        $data=product::find($id);
        
        $data->delete();
        
        return redirect()->back()->with('message','Delete Product Successfully');
    }
    
    /*
      edit and Update Product
    */
    public function EditProduct($id)
    {    $category=category::all();
        $data=product::find($id);
        
        return view('admin.edit_product',compact('data','category'));
    }
    
    public function UpdateProduct(Request $request,$id)
    {
        $data=product::find($id);
        
        $data->title=$request->title;
        
        $data->description=$request->description;
        
        $data->price=$request->price;
        
        $data->discount=$request->discount;
        
        $data->quantity=$request->quantity;
        
        $data->category=$request->category;
        
        $image=$request->image;
        
        $imagename=time().'.'.$image->getClientOriginalExtension();
        
        $request->image->move('product_image',$imagename);
        
        $data->image=$imagename;
        
        $data->save();
        
        return redirect()->back()->with('message','Update Successfully');
    }
    
    /*
      order function
    */
    public function Order(){
        $order=order::all();
        return view('admin.order',compact('order'));
    }
    
    //delivered 
    
    public function Delivered($id)
    {
        $order=order::find($id);
        
        $order->delivery_status="delivered";
        $order->payment_status="Paid";
        
        $order->save();
        
        return redirect()->back();
    }
    
    public function PrintPDF($id)
    {   $order=order::find($id);
        
        $pdf=PDF::loadView('admin.pdf',compact('order'));
        
        return $pdf->download('order_details.pdf');
    }
}
