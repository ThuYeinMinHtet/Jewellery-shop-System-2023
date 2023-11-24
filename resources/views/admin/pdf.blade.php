<!DOCTYPE html>
<html>
<head>
       <title>Order PDF</title>
</head>

<body>
       <h1>Order detail</h1>
       
    Customer Name:    <h3>{{$order->name}}</h3>
    Customer Email:   <h3>{{$order->email}}</h3>
    Customer Ph.no:   <h3>{{$order->phone}}</h3>
    Customer address: <h3>{{$order->address}}</h3>
    Customer ID:      <h3>{{$order->user_id}}</h3>
    Product Name:     <h3>{{$order->title}}</h3>
    Product Price:    <h3>{{$order->price}}</h3>
    Product Quantity: <h3>{{$order->quantity}}</h3>
    Payment Status:   <h3>{{$order->payment_status}}</h3>
    Product ID:       <h3>{{$order->Product_id}}</h3>
<br><br>    
    <img height="250" width="250" src="product_image/{{$order->image}}">
</body>
</html>