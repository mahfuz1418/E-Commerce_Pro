<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use PDF;
use Notification;
use App\Notifications\EmailNotification;


class AdminController extends Controller
{
    public function view_category()
    {
        $categories = Category::all();
        return view('admin.category', compact('categories'));
    }

    public function add_category(Request $request)
    {
        $data = new Category();
        $data->category_name = $request->category;
        $data->save();

        return redirect()->back()->with('message', 'Category Added Successfully');
    }

    public function delete_category($id)
    {
        $data = Category::findOrFail($id);
        $data->delete();

        return redirect()->back()->with('message', 'Category Deleted Successfully');
    }

    public function view_product()
    {
        $categories = Category::all();
        return view('admin.product', compact('categories'));
    }

    public function add_product(Request $request)
    {
        $request->validate([
            'product_title' => 'required',
            'product_des' => 'required',
            'product_price' => 'required',
            'category' => 'required',
            'product_image' => 'required',
        ]);
        $product = new Product();
        $product->title = $request->product_title;
        $product->description = $request->product_des;
        $product->price = $request->product_price;
        $product->discount_price = $request->dis_price;
        $product->category = $request->category;
        $product->quantity = $request->product_quantity;

        $image = $request->product_image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $image->move('product', $imagename);
        $product->image = $imagename;

        $product->save();


        return back()->with('message', 'Product Added Successfully');
    }

    public function show_product()
    {
        $products = Product::all();
        return view('admin.show_product', compact('products'));
    }

    public function delete_product($id)
    {
        $data = Product::findOrFail($id);
        $data->delete();

        return redirect()->back()->with('message', 'Product Item Deleted Successfully');
    }

    public function edit_product($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.update', compact('product', 'categories'));
    }

    public function update_product(Request $request, $id)
    {
        $request->validate([
            'product_title' => 'required',
            'product_des' => 'required',
            'product_price' => 'required',
            'category' => 'required',
        ]);
        $product =  Product::find($id);
        $product->title = $request->product_title;
        $product->description = $request->product_des;
        $product->price = $request->product_price;
        $product->discount_price = $request->dis_price;
        $product->category = $request->category;
        $product->quantity = $request->product_quantity;

        $image = $request->product_image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('product', $imagename);
            $product->image = $imagename;
        }


        $product->save();
        
        return redirect('/show_product')->with('message', 'Product Updated Successfully');
    }

    public function show_order()
    {
        $orders = Order::all();
        return view('admin.order', compact('orders'));
    }

    public function delivered_product($id)
    {
        $order = Order::find($id);
        $order->delevery_status = 'Delivered';   
        if ($order->payment_status!=='Paid With Card') { 
            $order->payment_status = 'Paid by cash';   
        } 
        
        $order->save();
        return back();
    }

    // download pdf method 
    public function get_pdf($id)
    {
        
        $date = date('m/d/Y');
        $order = Order::find($id);
          
        $pdf = PDF::loadView('admin.getpdf', compact('date', 'order'));
    
        return $pdf->download('invoice.pdf');
        
    }

    // SEND EMAIL VIEW FUNCTION 
    public function send_email($id)
    {
        $order = Order::find($id);
        return view('admin.send_email', compact('order'));
    }

    public function send_user_mail(Request $request, $id)
    {
        $order = Order::find($id);
  
        $details = [
            'greeting' => $request->gretting,
            'firstline' => $request->firstline,
            'body' => $request->body,
            'button' => $request->button,
            'url' => $request->url,
            'lastline' => $request->lastline,
        ];
  
        Notification::send($order, new EmailNotification($details));
   
        return back()->with('message', 'Mail Send to Customer');
    }

    public function search(Request $request)
    {
        $serch_txt = $request->search;
        $orders = Order::where('name', 'LIKE', "%$serch_txt%")->orWhere('email', 'LIKE', "%$serch_txt%")->orWhere('phone', 'LIKE', "%$serch_txt%")->orWhere('address', 'LIKE', "%$serch_txt%")->orWhere('product_title', 'LIKE', "%$serch_txt%")->orWhere('payment_status', 'LIKE', "%$serch_txt%")->orWhere('delevery_status', 'LIKE', "%$serch_txt%")->orWhere('email', 'LIKE', "%$serch_txt%")->get();
        return view('admin.order', compact('orders' ));
    }

}
