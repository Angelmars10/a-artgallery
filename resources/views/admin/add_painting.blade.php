<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')

   <style type="text/css">
    .div_deg{
            display: flex;
            justify-content: center;
            align text: center;
            margin-top: 60px;

    }
    h1{
        color:grey;
    }
    label{
        display:inline-block;
        width:250px;
        font-size:18px!important;
        color:white!important;
    }
    input[type='text']{
        width: 300px;
        height:50px;
    }
    textarea{
        width:300px;
        height:50px;
    }
    .input_deg{
        padding:15px;

    }
    </style>
  </head>
  <body>
  @include('admin.header')
   @include('admin.slider')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

          <h1> Add Painting</h1>
          <div class="div_deg">

            <form action="{{url('upload_painting')}}" method="Post" 
                enctype="multipart/form-data">

                @csrf
                
                <div class="input_deg">
                    <label> Painting Title</label>
                    <input type="text" name="title" required>
                </div>

                <div class="input_deg">
                    <label> Painting Description</label>
                    <textarea name="description" required></textarea>
                </div>

                <div class="input_deg">
                    <label> Painting Price</label>
                    <input type="text" name="price">
                </div>

                <div class="input_deg">
                    <label> Painting Quantity</label>
                    <input style="   width: 300px;
        height:50px;" type="number" name="qty">
                </div>

                <div class="input_deg">
                    <label> Painting Category</label>
                    <select style="   width: 300px;
                         height:50px;" name="category" required>
                        <option>Selection Option</option>

                       @foreach($category as $category)
                       <option value="{{$category->category_name}}">{{$category->category_name}}</option>

                       @endforeach

                    </select>
                </div>

                <div class="input_deg">
                    <label> Painting Image</label>
                    <input style="   width: 300px;
        height:50px;" type="file" name="image">
                </div>


                <div class="input_deg">
                   <input class="btn btn-success" type="submit" value="Add Painting">
                    
                </div>

            </form>
            
          </div>
 
          
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>