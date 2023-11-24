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
                       .title_deg{
                           text-align:center;
                           font-size: 25px;
                           font-weight: bold;
                           padding-bottom: 14px;
                       }
                       .table_deg{
                           border:2px solid white;
                           width:100%;
                           margin:auto;
                           text-align: center;
                       }
                       th{
                           background-color: blue;
                       }
                       .img_deg{
                           height:150px;
                           width:150px;
                       }
                       tr,td{
                           border:2px solid pink;
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
              <h1 class="title_deg">All Orders</h1>
              <table class="table_deg">
                      <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>Phone</th> 
                      <th>Product_title</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th>Payment_status</th>
                      <th>Delivery_status</th>
                      <th>Image</th>
                      <th>Delivered</th>
                       <th>Print PDF</th>
                      </tr>
                   @foreach($order as $order)   
                      <tr>
                        <td>{{$order->name}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->product_title}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->price}}</td>
                        <td>{{$order->payment_status}}</td>
                        <td>{{$order->delivery_status}}</td>
                        <td><img class="img_deg" src="/product_image/{{$order->image}}"></img></td>
                        <td>
                        @if($order->delivery_status=='processing')
                        <a href="{{url('delivered',$order->id)}}" onclick="return confirm('Are you sure this product is delivered?')" class="btn btn-primary">deliverd</a>
                        
                        @else
                         <p style="color:green;">Delivered</p>
                         
                         @endif
                        </td>
                        <td>
                             <a href="{{url('print/pdf',$order->id)}}" class="btn btn-secondary">Print PDF</a>
                        </td>
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