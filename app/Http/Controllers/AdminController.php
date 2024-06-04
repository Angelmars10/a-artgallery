<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
    public function view_category(){

        $data = Category::all();
        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request){

       $category = new Category;

       $category->category_name = $request->category;

       $category->save();
      
       toastr()->timeOut(10000)->closeButton()->addSuccess('Operation completed successfully.');

       return redirect()->back();

    }
    public function delete_category($id){
        $data = Category::find($id);

        toastr()->timeOut(10000)->closeButton()->addSuccess('Deleted Successfully');

        $data->delete();
        return redirect()->back();
    }

    public function edit_category( $id){
        $data = Category::find($id);
        return view('admin.edit_category',compact('data'));
    }

    public function update_category(Request $request, $id){
        $data = Category::find($id);
        $data->category_name = $request->category;
        $data->save();

        toastr()->timeOut(10000)->closeButton()->addSuccess(' Successfully');

        return redirect('/view_category');

    }



    public function add_painting(){
        $category = Category::all();
        return view('admin.add_painting',compact('category'));
    }

    public function upload_painting(Request $request){

            $data = new Product;
            $data->title = $request->title;
            $data->description = $request->description;
            $data->price = $request->price;
            $data->quantity = $request->qty;
            $data->category = $request->category;

            $image = $request->image;

            if($image){
                $imagename =time().'.'.$image->getClientOriginalExtension();
                $request->image->move('paintings', $imagename);

                $data->image =$imagename;
            }

            $data->save();
            toastr()->timeOut(10000)->closeButton()->addSuccess('Successfully Added');
            
            return redirect()->back();


    }

    public function view_painting(){
        $painting = Product::paginate(3);
        return view('admin.view_painting',compact('painting'));
    }

    public function delete_painting($id){

        $data = Product::find($id);

        $image_path = public_path('paintings/'.$data->image);

        if(file_exists($image_path))
        {
            unlink($image_path);
        }

        toastr()->timeOut(10000)->closeButton()->addSuccess('Deleted Successfully');

        $data->delete();

            return redirect()->back();

    }


    //UPDATE SA PAINTING
    public function update_painting($id){

        $data = Product::find($id);

        $category = Category::all();
        return view('admin.update_page',compact('data','category'));
    }

        //EDIT PAINTING

    public function edit_painting(Request $request, $id){

        $data = Product::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;
        $image = $request->image;

        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('paintings',$imagename);

            $data->image = $imagename;


        }

        $data->save();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Successfully Updated');

        return redirect('/view_painting');

    }

    public function product_search(Request $request){

        $search = $request->search;
        $painting = Product::where('title','LIKE','%'.$search.'%')->orWhere('category','LIKE','%'.$search.'%')->paginate(3);


        return view('admin.view_painting',compact('painting'));
    }

    public function view_order(){

        $data = Order::all();

        return view('admin.order',compact('data'));
    }

    public function on_the_way($id){

        $data = Order::find($id);

        $data->status = 'On the way';
        $data->save();
        return redirect('/view_order');
    }

    public function delivered($id){

        $data = Order::find($id);

        $data->status = 'Delivered';
        $data->save();
        return redirect('/view_order');
    }
}
