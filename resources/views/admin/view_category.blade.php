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
      .div_center{
          text-align: center;
          padding-top: 40px;
      }
      .h2font{
          font-size: 25px;
          padding-bottom: 40px;
      }
      .input_color{
          color:black;
      }
      
      .center{
          margin: auto;
          width:50%;
          text-align: center;
          margin-top: 30px;
          border:3px solid pink;
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
                     <h3 class="h2font">Add New Category</h3>
                     
                     <form action="{{url('/add_category')}}" method="post">
                       @csrf
                       <input class="input_color" type="text" name="name" placeholder="Write the Category Name">
                       
                       <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
                     </form>
                     </div>
                     
                         <table class="center">
                                 <tr>
                                 <td>Category Name</td>
                                 <td>Action </td>
                                 </tr>
                                @foreach($data as $data) 
                                 <tr>
                                 <td>{{$data->category_name}}</td>
                                 <td>
                                 <a 
                                 onclick="return confirm('Are you sure To Delete This')"
                                 href="{{url('/category/delete',$data->id)}}" class="btn btn-danger"> Delete
                                 </a>
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