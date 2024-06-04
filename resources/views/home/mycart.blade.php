<!DOCTYPE html>
<html>

<head>
<title>A-Art Gallery-MyCart</title>
  @include('home.css')

  <style type="text/css">

.div_deg{
    display:flex;
    justify-content:center;
    align-items:center;
    margin:60px;
}


.cart_value{
    text-align:center;
    margin-bottom: 70px;
    padding: 18px;
}
.order_deg{
  padding-right: 150px;
  margin-top: -50px;

}



.label-container {
    position: relative;
    margin-bottom: 20px;
    font-family: Arial, sans-serif;
}

.label-container label {
    position: absolute;
    top: 10px;
    left: 10px;
    color: #999;
    font-size: 16px;
    transition: all 0.2s ease-in-out;
    pointer-events: none;
}

.label-container input {
    width: 100%;
    padding: 10px 10px 10px 40px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    transition: border-color 0.2s ease-in-out;
}

.label-container input:focus {
    border-color: #007BFF;
    outline: none;
}

.label-container input:focus + label,
.label-container input:not(:placeholder-shown) + label {
    top: -10px;
    left: 10px;
    font-size: 12px;
    color: #007BFF;
    background: #fff;
    padding: 0 5px;
}

.label-container input::placeholder {
    color: transparent;
}
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
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->

  </div>
<div class="div_deg">






    <div class="order_deg">
    <form action="{{url('confirm_order')}}" method="Post">
      @csrf
      <div class="label-container">
        <input type="text" name="name" id="name" required placeholder=" " value="{{Auth::user()->name}}">
        <label for="name">Reciever Name</label>
</div>

<div class="label-container">
        <input type="text" name="address" id="name" required placeholder=" " value="{{Auth::user()->address}}">
        <label for="name">Reciever Address</label>
</div>
      
<div class="label-container">
        <input type="text" name="phone" id="name" required placeholder=" " value="{{Auth::user()->phone}}">
        <label for="name">Reciever Phone</label>
</div>
    

      <div class="div_gap">    
      <input class="btn btn-primary mt-4" type="submit" value="Place Order">
      </div>


    </form>
    </div>


<table class="styled-table">
  <thead>
        <tr>
            <th> Painting Title</th>
            <th> Painting Price</th>
            <th> Painting Image</th>
            <th> Remove</th>


</tr>
</thead>

<?php

$value = 0;
?>
        @foreach($cart as $cart)
        <tbody>
<tr>
            <td>{{$cart->product->title}}</td>
            <td>{{$cart->product->price}}</td>
            <td>
                <img width="150"src="/paintings/{{$cart->product->image}}">
            </td>
            <td>
                <a class="btn btn-danger" onClick="confirmation(event)"  href="{{url('delete_cart',$cart->id)}}">Remove</a>

              
</td>


</tr>

<?php
$value = $value + $cart->product->price;
?>

@endforeach
</tbody>
</table>
</div>


<div class="cart_value">
    <h3> Total Value of inside the Cart is :₱ {{$value}}</h3>
</div>

  <!-- info section -->

  @include('home.footer')

</body>

</html>
