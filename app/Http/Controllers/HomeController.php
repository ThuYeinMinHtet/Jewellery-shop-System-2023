<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\cart;
use App\Models\order;

use Session;

use Stripe;

class HomeController extends Controller
{
    //
    public function redirect(){
        $usertype=Auth::user()->usertype;
        
        if($usertype=='1')
        {
            return view('admin.home');
        }
        else{
            $product=product::paginate(6); 
            return view('home.userpage',compact('product'));
        }
    }
    
    public function index(){
        $product=product::paginate(6);
        return view('home.userpage',compact('product'));
    }
    
    public function DetailProduct($id)
    {
        $product=product::find($id);
        return view('home.detail_product',compact('product'));
    }
    
    public function AddCart(Request $request,$id){
        if(Auth::id())
        {
            $user=Auth::user();
            
            $product=product::find($id);
            
            $cart=new cart;
            
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->user_id=$user->id;
            
            $cart->product_title=$product->title;
            if($product->discount!=null)
            {
             
             $cart->price=$product->discount * $request->quantity;   
            }
            else{
                $cart->price=$product->price * $request->quantity;
            }
            
            $cart->image=$product->image;
            $cart->Product_id=$product->id;
            $cart->quantity=$request->quantity;
            
            $cart->save();
            
            return redirect()->back();
             
            
        }
        else
        {
            return redirect('login');
        }
    }
    public function ShowCart()
    {  
        if(Auth::id())
        {
             $id=Auth::user()->id;
    
    $cart=cart::where("user_id","=","$id")->get();
    
        return view('home.show_cart',compact('cart'));
        }
        
        else
        {
            return route('login');
        }
      
    }
    public function RemoveCart($id)
    {
         $cart=cart::find($id);
         
         $cart->delete();
         
         return redirect()->back();
    }
    
    public function CashOrder()
    {
    $user=Auth::user();
    
    $userid=$user->id;
    
    $data=cart::where('user_id','=',$userid)->get();
    
    foreach($data as $data)
    {
        $order=new order;
        $order->name=$data->name;
        $order->email=$data->email;
        $order->phone=$data->phone;
        $order->address=$data->address;
        $order->user_id=$data->user_id;
        
        $order->product_title=$data->product_title;
        $order->price=$data->price;
        $order->quantity=$data->quantity;
        $order->image=$data->image;
        $order->product_id=$data->Product_id;
        
        $order->payment_status='cash on delivery';
        $order->delivery_status='processing';
        
        $order->save();
        
        $cart_id=$data->id;
        
        $cart=cart::find($cart_id);
        
        $cart->delete();
    }
    
    return redirect()->back()->with('message','We received your order. We will Connect you soon...');
    }
    
    public function StripePay($totalprice)
    {
        return view('home.stripePay',compact('totalprice'));
    }
    
    
     public function stripePost(Request $request,$totalprice)

    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    

        Stripe\Charge::create ([

                "amount" => $totalprice / 1500,

                "currency" => "usd",

                "source" => $request->stripeToken,

                "description" => "Test payment from itsolutionstuff.com." 

        ]);

         $user=Auth::user();
    
    $userid=$user->id;
    
    $data=cart::where('user_id','=',$userid)->get();
    
    foreach($data as $data)
    {
        $order=new order;
        $order->name=$data->name;
        $order->email=$data->email;
        $order->phone=$data->phone;
        $order->address=$data->address;
        $order->user_id=$data->user_id;
        
        $order->product_title=$data->product_title;
        $order->price=$data->price;
        $order->quantity=$data->quantity;
        $order->image=$data->image;
        $order->product_id=$data->Product_id;
        
        $order->payment_status='Paid';
        $order->delivery_status='processing';
        
        $order->save();
        
        $cart_id=$data->id;
        
        $cart=cart::find($cart_id);
        
        $cart->delete();
    }
      

        Session::flash('success', 'Payment successful!');

              

        return back();

    }
}
