<x-app-layout>
  
  </x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
  
  <base href="/public">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Jewelery Shop Management System</title>
    <!-- plugins:css -->
  @include('admin.css')
  <style type="text/css">
          .div_center{
              text-align: center;
              padding-top: 40px;
          
          }
          .font_size{
              font-size: 25px;
              padding-bottom : 30px;
          }
          
          .text_color{
              color: black;
              padding-bottom: 20px;
          }
          .option_text{
              color:black;
              
          }
          label{
              display: inline-block;
              width: 200px;
          }
          .div_design{
              padding-bottom: 10px;
          }
  </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
          @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
                  @include('admin.header')
                 <!-- partial -->
               <div class="main-panel">
               <div class="content-wrapper">
                @if(session()->has('message'))
               
               <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert"
            aria-hidden="true">x</button>
                    {{session()->get('message')}}
               </div>
               @endif
               <div class="div_center">
                   
                    <h1 class="font_size">Edit Product Here</h1>
                    <form action="{{url('/update_product',$data->id)}}" method="post" enctype="multipart/form-data">
                 @csrf
                  <div class="div_design">
                   <label>Product  Title:</label>  
                     <input type="text" class="text_color" name="title"
                     placeholder="Write the Product title" value="{{$data->title}}" required/>
                       </div>
                      <div class="div_design">
                      <label>Product  Description:</label>  
                     <input type="text" class="text_color" name="description"
                     placeholder="Write the Product description" value="{{$data->description}}" required/>
                           </div>
                           <div class="div_design">
                      <label>Product  Price:</label>  
                     <input type="number" class="text_color" name="price"
                     placeholder="Write the Product Price" value="{{$data->price}}" required/>
                                </div>
                                <div class="div_design">
                      <label>Product  Quantity:</label>  
                     <input type="number" class="text_color" name="quantity"
                     placeholder="Write the Product Quantity" value="{{$data->quantity}}" required/>
                                     </div>
                                <div class="div_design">
                      <label>Product  Discount:</label>  
                     <input type="number" class="text_color" name="discount"
                     placeholder="Write the Product Discount Price" value="{{$data->discount}}" required/>
                                           </div>
                                           <div class="div_option">
                     <label>Product  Category:</label>  
                     <select name="category" class="text_color">
                     <option value="{{$data->category}}">{{$data->category}}</option>
                     @foreach($category as $cate)
                     <option class="option_text" name="{{$cate->category_name}}">{{$cate->category_name}}</option>
                     @endforeach
                     </select>
                                    </div>
                                    <div class="div_image">
                      <label>Current Product Image:</label>  
                     <img style="margin:auto;" height="100" width="100" src="/product_image/{{$data->image}}" >
                     </div>
                                    
                                    <div class="div_image">
                      <label>Product  Image:</label>  
                     <input type="file" name="image"
                     />
                     </div>
                     <div class="div_design">
                           <input type="submit" value="Update Product"
                           class="btn btn-success">
                     </div>
                     </form>
                     </div>
               </div>
               </div>
        
              <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>