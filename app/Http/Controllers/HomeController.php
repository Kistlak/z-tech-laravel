<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function set_data_to_table()
    {
        $GetProducts = Product::all();
        $output = '';

        $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%">Id</th>  
                     <th width="40%">Product</th>  
                     <th width="40%">Small Description</th>  
                     <th width="10%">Edit</th>  
                     <th width="10%">Delete</th>  
                </tr>';


            foreach($GetProducts as $row){
                $output .= '  
                <tr>  
                     <td class="product_id">'. $row["id"].'</td>  
                     <td class="input_product_name" data-id1="'.$row["id"].'" contenteditable>'.$row["product_name"].'</td>  
                     <td class="input_small_description" data-id2="'.$row["id"].'" contenteditable>'.$row["small_description"].'</td>  
                     <td><button type="button" name="edit_btn" data-id3="'.$row["id"].'" class="btn btn-xs btn-success btn_edit">Edit</button></td>  
                     <td><button type="button" name="delete_btn" data-id3="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>';
            }
            $output .= '  
           <tr style="background: bisque;">  
                <td></td>  
                <td id="input_product_name" contenteditable>Type here</td>  
                <td id="input_small_description" contenteditable>Type here</td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">Save</button></td>  
           </tr> ';

 $output .= '</table>  

      </div>';
        echo $output;
    }

    public function save_table_data(Request $request)
    {
        $SaveProduct = new Product;
        $SaveProduct->product_name = $request->product_name;
        $SaveProduct->small_description = $request->small_description;
        $SaveProduct->save();

        echo "Successfully Inserted";
    }

    public function edit_table_data(Request $request)
    {
        $EditProduct = Product::where("id", $request->product_id)->first();
        $EditProduct->product_name = $request->product_name;
        $EditProduct->small_description = $request->small_description;
        $EditProduct->update();

        echo "Successfully Updated";
    }

    public function delete_table_data(Request $request)
    {
        $DeleteProduct = Product::where("id", $request->product_id)->first();
        $DeleteProduct->delete();

        echo "Successfully Deleted";
    }

}


