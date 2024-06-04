<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')
   <style type="text/css">
    input[type='text']
    {
        width: 300px;
        height:35px
    }
    .div_deg
    {
        display:flex;
        justify-content: center;
        align-items: center;
        margin: 30px;

    }
    .table_deg{
        text-align: center;
        margin: auto;
        border: 2px solid grey;
        margin-top:50px;
    }
    th{
        background-color: grey;
        padding:15px;
        font-size:20px;
        font-weight:bold;
        color:white;

    }

    td{
        color: white;
        padding:10px;
        border: 1px solid grey;
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

          <h1 >Add Category</h1>


          <div class="div_deg">

          
       
            <form action="{{url('add_category')}}" method="post">

                @csrf


                <div>
                    <input type="text" name="category">
                
                <input class="btn btn-primary" type="submit" value="Add Category">
                </div>
            </form>
            </div>
          

            <div>

                <table class="table_deg">

              
                    <tr>
                        <th>Category Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      
                    </tr>
                   
                        @foreach($data as $data)

                    <tr>
                    <td>{{$data->category_name}}</td>

                        <td>
                            <a class="btn btn-success"href= "{{url('edit_category',$data->id)}}">Edit</a>

                        <td>
                        <a class="btn btn-danger" onClick="confirmation(event)"
                        href="{{url('delete_category',$data->id)}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                   
                </table>            

            </div>



        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.js')
  
  </body>
</html>