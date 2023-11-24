<section class="price_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Our Jewellery Price
        </h2>
      </div>
      
      <div class="price_container">
        @foreach($product as $products)
        <div class="box">
          <div class="name">
            <h6>
              {{$products->title}}
            </h6>
          </div>
          <div class="img-box">
            <img src="product_image/{{$products->image}}" alt="">
          </div>
          <div class="detail-box">
          @if($products->discount!=null) 
          <h5 style="color:red">
          discount price :<br>
              {{$products->discount}}  MMK
            </h5>
            
            <h5 style="text-decoration: line-through;color:blue;">
              {{$products->price}}  MMK
            </h5>
            
            @else
            <h5 style="color:blue">
                 {{$products->price}}   MMK
            </h5>
            @endif
            <a href="{{url('product/detail',$products->id)}}">
              View Detail
            </a>
            
             <form action="{{url("add_cart/$products->id")}}" method="post">
             @csrf
             <div class="row" style="padding-top:4px">
             <div class="col-md-4">
                    <input type="number" name="quantity" value="1"
                    min="1" style="width:100px"/>
                    </div>
                    <div class="col-md-4">
                    <input type="submit" value="Add to Cart" /> 
                    </div>  
                    </div>
             </form>
          </div>
          
        </div>
        @endforeach 
        
    </div>
    
  </section>