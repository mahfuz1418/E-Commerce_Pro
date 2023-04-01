<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

// use Session;
use Stripe;


class HomeController extends Controller
{

    public function index()
    {
        $products = Product::paginate(6)->withQueryString();
        $comments = Comment::latest()->get();
        $reply = Reply::all();
        return view('home.userpage',  compact('products', 'comments', 'reply'));
    }

    public function redirect()
    {
        $role = Auth::user()->role;

        if ($role === 'admin') {
            $total_product = Product::all()->count();
            $total_order = Order::all()->count();
            $total_customer = User::all()->count();

            $orders = Order::all();
            $total_revenue = 0;
            foreach ($orders as $order) {
                $total_revenue = $total_revenue + $order->price;
            }

            $total_delivered = Order::where('delevery_status', 'Delivered')->get()->count();
            $total_processing = Order::where('delevery_status', 'Processing')->get()->count();

            return view('admin.home', compact('total_product', 'total_order', 'total_customer', 'total_revenue', 'total_delivered', 'total_processing'));
        } else {
            $products = Product::paginate(6)->withQueryString();
            $comments = Comment::latest()->get();
            $reply = Reply::all();
            return view('home.userpage',  compact('products', 'comments', 'reply'));
        }
    }


    public function product_details($id)
    {
        $product = Product::find($id);
        return view('home.product_details',  compact('product'));
    }

    public function add_cart(Request $request, $id)
    {

        if (Auth::id()) {
            $request->validate([
                '*' => 'required',
            ]);

            $user = Auth::user();
            $userid = $user->id;
            $product = Product::find($id);
            $product_exist_id = Cart::where('product_id', $id)->where('user_id', $userid)->get('id')->first();

            if ($product_exist_id) {
                $cart = Cart::find($product_exist_id)->first();
                $quantity = $cart->quantity;

                $cart->quantity = $quantity + $request->quantity;
                if ($product->discount_price != null) {
                    $cart->price = $product->discount_price * $cart->quantity;
                } else {
                    $cart->price = $product->price * $cart->quantity;
                }
                $cart->save();
                return redirect('/show_cart')->with('message', 'Your Cart Added Successfully');
            } else {
                $cart = new Cart();

                $cart->name = $user->name;
                $cart->email = $user->email;
                $cart->phone = $user->phone;
                $cart->address = $user->address;
                $cart->product_id = $product->id;
                $cart->user_id = $user->id;
                $cart->product_title = $product->title;
                $cart->quantity = $request->quantity;
    
                if ($product->discount_price != null) {
                    $cart->price = $product->discount_price * $request->quantity;
                } else {
                    $cart->price = $product->price * $request->quantity;
                }
    
                $cart->image = $product->image;
                $cart->save();
    
                return redirect('/show_cart')->with('message', 'Your Cart Added Successfully');
            }
            

        } else {
            return redirect('login');
        }
    }

    public function show_cart()
    {
        if (Auth::id()) {
            $id = Auth::id();
            $carts = Cart::where('user_id', $id)->get();
            return view('home.cart', compact('carts'));
        } else {
            return redirect('login');
        }
    }

    public function remove_cart($id)
    {
        Cart::find($id)->delete();
        return redirect()->back();
    }

    public function cash_order()
    {
        $user = Auth::user();
        $user_id = $user->id;
        $carts = Cart::where('user_id', $user_id)->get();

        foreach ($carts as $cart) {
            $order = new Order();
            $order->name = $cart->name;
            $order->email = $cart->email;
            $order->phone = $cart->phone;
            $order->address = $cart->address;
            $order->user_id = $cart->user_id;
            $order->product_id = $cart->product_id;
            $order->product_title = $cart->product_title;
            $order->quantity = $cart->quantity;
            $order->price = $cart->price;
            $order->image = $cart->image;
            $order->payment_status = 'Cash On Delevery';
            $order->delevery_status = 'Processing';
            $order->save();

            $id = $cart->id;
            $find_cart = Cart::find($id);
            $find_cart->delete();
        }
        return back()->with('message', 'We have recived your order, We will connect with you soon!!!');
    }

    // stripe payment method 
    public function stripe($total)
    {
        return view('home.stripe', compact('total'));
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request, $total)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([
            "amount" => $total * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Product selling payment"
        ]);

        // after payment data store cart to order table 
        $user = Auth::user();
        $user_id = $user->id;
        $carts = Cart::where('user_id', $user_id)->get();

        foreach ($carts as $cart) {
            $order = new Order();
            $order->name = $cart->name;
            $order->email = $cart->email;
            $order->phone = $cart->phone;
            $order->address = $cart->address;
            $order->user_id = $cart->user_id;
            $order->product_id = $cart->product_id;
            $order->product_title = $cart->product_title;
            $order->quantity = $cart->quantity;
            $order->price = $cart->price;
            $order->image = $cart->image;
            $order->payment_status = 'Paid With Card';
            $order->delevery_status = 'Processing';
            $order->save();

            $id = $cart->id;
            $find_cart = Cart::find($id);
            $find_cart->delete();
        }

        Session::flash('success', 'Payment successful!');

        return back();
    }

    // show order 
    public function show_home_order()
    {
        if (Auth::id()) {
            $id = Auth::id();
            $orders = Order::where('user_id', $id)->get();
            return view('home.order', compact('orders'));
        } else {
            return redirect('login');
        }
    }

    // cancel order
    public function cancel_order($id)
    {
        $order = Order::find($id);
        $order->delevery_status = 'Order Canceled'; 
        $order->save();
        return back();
    }

    public function add_comment(Request $request)
    {
        $request->validate([
            '*' => 'required',
        ]);

        $comment = new Comment();

        $comment->name = Auth::user()->name;
        $comment->comment = $request->comment;
        $comment->user_id = Auth::user()->id;
        $comment->save();
        return back();
        
    }

    public function add_reply(Request $request)
    {
        $request->validate([
            '*' => 'required',
        ]);

        $reply = new Reply();

        $reply->name = Auth::user()->name;
        $reply->comment_id = $request->commentId;
        $reply->reply = $request->reply;
        $reply->user_id = Auth::user()->id;
        $reply->save();

        return back();
        
    }

    public function search_product(Request $request)
    {
        $search_txt = $request->search;

        $products = Product::where('title', 'LIKE', "%$search_txt%")->orWhere('category', 'LIKE', "%$search_txt%")->paginate(6);
        $comments = Comment::latest()->get();
        $reply = Reply::all();
        return view('home.userpage', compact('products', 'comments', 'reply'));
    }
}
