<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')
   <style type="text/css">
    .div_deg{
        display:flex;
        justify-content: center;
        align-items: center;
        margin-top:60px;
    }
    .table_deg{
        border: 2px solid grey;
    }
    th{
        background-color:skyblue;
        color:white;
        font-size: 19px;
        font-weight:bold;
        padding: 15px;

        }
        td{
            border:1px solid skyblue;
            text-align:center;
            color:white;

        }
        input[type="search"]{
          width:400px;
          height:43px;
          margin-top: 60px;
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


          <form action="{{url('product_search')}}" method="get">
            <input type="search" name="search">
            <input type="submit" class="btn btn-secondary" value="Search">
          </form>

            <div class="div_deg">

            <table class="table_deg">
                <tr>
                    <th>Painting Title</th>
                    <th>Painting Description</th>
                    <th>Painting Category</th>
                    <th>Painting Price</th>
                    <th>Painting Quantity</th>
                    <th>Painting Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                   

                </tr>
                
         
            @foreach($painting as $paintings)

            <tr>
                    <td>{{$paintings->title}}</td>
                    <td>{{!!Str::limit($paintings->description,50)!!}}</td>
                    <td>{{$paintings->category}}</td>
                    <td>{{$paintings->price}}</td>
                    <td>{{$paintings->quantity}}</td>
                   
                    
                    <td>
                        <img  height="120" width="120"src="paintings/{{$paintings->image}}">
                    </td>
                       
                    <td>
                        <a class="btn btn-success" onClick="confirmation(event)" href="{{url('update_painting',$paintings->id)}}"> 
                          Edit</a>
                     </td>

                    <td>
                        <a class="btn btn-danger" onClick="confirmation(event)" href="{{url('delete_painting',$paintings->id)}}"> Delete</a>
                     </td>


            </tr>
            @endforeach
           
            </table>

         

        </div>
        <div class="div_deg">
        {{$painting->onEachSide(1)->links()}}

    </div>

     

          
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  </body>
</html>