<!DOCTYPE html>
<html>

<head>
<title>A-Art Gallery-Product_details</title>
  @include('home.css')


  <style type="text/css">

    .div_center{
        display:flex;
        justify-content: center;
        align-items:center;
        padding: 30px;
    }
    .detail-box{
        padding:6px;
    }
    
    </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
   
  </div>
 <!--Product details-->

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
         PAINTINGS
        </h2>
      </div>
      <div class="row">
     
        <div class=" col-md-12 ">
          <div class="box">
      
              <div class="div_center">
                <img width="400"src="/paintings/{{$data->image}}" alt="">
              </div>



              <div class="detail-box">
                <h6>Title: {{$data->title}}</h6>
                <h6>Price: 
                <span> ${{$data->price}}</span>
              </div>


              <div class="detail-box">
                <h6>Category: {{$data->category}}</h6>
                <h6>Available Quantity: 
                <span>{{$data->quantity}}</span>
              </div>
              

              <div class="detail-box" style="margin-top:5px;">
                
               <p>Description: {{$data->description}}</p>
              </div>
            
            
            
                    
          
          </div>
        </div>
      




       
      </div>
     
    </div>
  </section>

<!--Product details end-->




  <!-- info section -->

  @include('home.footer')

</body>

</html>
