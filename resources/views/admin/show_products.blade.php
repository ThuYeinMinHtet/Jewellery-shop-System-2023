<x-app-layout>
  
  </x-app-layout>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Jewelery Shop Management System</title>
    <!-- plugins:css -->
  @include('admin.css')
  <style type="text/css">
   .center{
       margin: auto;
       
       width:85%;
       border:2px solid pink;
       text-align: center;
       margin-top: 40px;
   }
   .font_size{
       text-align: center;
       padding-top: 20px;
       font-size: 25px;
   }
   .img_size{
       width:150px;
       height: 150px;
   }
   .th_color{
       background-color: aqua;
       color: black;
   }
   td{
       background-color: fuchsia;
       color: black;
       border: 1px solid blue;
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
                 <h2 class="font_size">All Jewellery</h2>
                        <table class="center">
                                <tr class="th_color">
                                     <th>Title</th>
                                     <th>Description</th>
                                     <th>Quantity</th>
                                     <th>Price</th>
                                     <th>Category</th>
                                     <th>Discount</th>
                                     <th>Product Image</th>
                                     <th>Delete</th>
                                     <th>Edit</th>
                                </tr>
                                @foreach($product as $data)
                                <tr>
                                     <td>{{$data->title}}</td>
                                     <td>{{$data->description}}</td>
                                     <td>{{$data->quantity}}</td>
                                     <td>{{$data->price}}</td>
                                     <td>{{$data->category}}</td>
                                     <td>{{$data->discount}}</td>
                                     <td><img class="img_size" src="/product_image/{{$data->image}}"></td>
                                     <td><a href="{{url('product/delete',$data->id)}}"
                                      class="btn btn-danger" onclick="return confirm('Are you Sure to Delete?')">Delete</a></td>
                                     <td><a href="{{url('product/edit',$data->id)}}" class="btn btn-success" >Edit</a></td>
                                </tr>
                                @endforeach
                        </table>
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