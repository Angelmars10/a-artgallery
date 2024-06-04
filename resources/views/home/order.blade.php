<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A-Art Gallery-MyOrders</title>
    @include('home.css')
    
    <style type="text/css">
        /* Basic reset */
body {
    font-family: Arial, sans-serif;
}

table {
    border-collapse: collapse;
    width: 100%;
    margin: 20px 0;
    font-size: 18px;
    text-align: left;
}

th, td {
    padding: 12px 15px;
}

thead tr {
    background-color: #0ee8e4;
    color: #0f0e0e;
    text-align: left;
}

tbody tr {
    border-bottom: 1px solid #0d0d0d;
}

tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

tbody tr:last-of-type {
    border-bottom: 2px solid #080909;
}

tbody tr:hover {
    background-color: #f1f1f1;
}

        </style>
</head>
<body>
<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
<div>
<table class="styled-table">
 <thead>
    <tr>
        <th>Product Name</th>
        <th>Price</th>
        <th>Delivery Status</th>
        <th>Images</th>
</tr>
</thead>

        @foreach($order as $order)
        <tbody>
<tr>
    <td>{{$order->product->title}}</td>
    <td>{{$order->product->price}}</td>
    <td>{{$order->status}}</td>
       <td>
        <img height ="200" width ="300" src="paintings/{{$order->product->image}}">
</td>
</tr>
@endforeach
</tbody>
</table>

</div>
  </div>
    
  @include('home.footer')
</body>
</html>