<?php

namespace App\Http\Controllers;

use App\Cart;
use App\User;
use App\Product;
use App\Order;
use App\Category;
use App\Package;
use App\PackageProducts;
use Session;
use Auth;
use Mail;
use App\Mail\sendOrderInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class CartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
     
    /*****************  Product **************************************/ 
    
    public function getAddToCart(Request $request, $id, $redirect_page)
    {
        $product = Product::find($id);
		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);
		$cart->add($product, $product->id);
		$request->session()->put('cart', $cart);
		//dd($request->session()->get('cart'));
		if($redirect_page=='product_details_page'){
			return redirect('/product_details_page/'.$product->id);
		}
		elseif($redirect_page=='shopping-cart'){
			return redirect('/shopping-cart');
		}
		elseif($redirect_page=='product_page'){
			return redirect('/product_page/'.$product->category_id);
		}
		
    }
	
	public function getSubtractToCart(Request $request, $id, $redirect_page){
		$product = Product::find($id);
		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);
		$cart->subtract($product, $product->id);
		$request->session()->put('cart', $cart);
		//dd($request->session()->get('cart'));
		if($redirect_page=='product_details_page'){
			return redirect('/product_details_page/'.$product->id);
		}
		elseif($redirect_page=='shopping-cart'){
			return redirect('/shopping-cart');
		}
		
	}
	
	public function getRemoveFromCart(Request $request, $id, $redirect_page){
		$product = Product::find($id);
		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);
		$cart->remove($product, $product->id);
		$request->session()->put('cart', $cart);
		//dd($request->session()->get('cart'));
		if($redirect_page=='product_details_page'){
			return redirect('/product_details_page/'.$product->id);
		}
		elseif($redirect_page=='shopping-cart'){
			return redirect('/shopping-cart');
		}
		
	}
	
	public function getCart(){
		if(!Session::has('cart')){
			$totalPrice = 0;
			return view('Website/shoppingCart')->with('totalPrice',$totalPrice);
		}
		$oldCart = Session::get('cart');
		$cart = new Cart($oldCart);
		//dd($cart->items);
		$products = $cart->items;
		$product_details = array();
		$i=0;
		foreach($products as $product){
			$product_details[$i]['item'] = $product['item']->load('product_gallery_images','category');
			$product_details[$i]['qty'] = $product['qty'];
			$product_details[$i]['price'] = $product['price'];
			$i++;
		}
		//dd($product_details);
		$totalPrice = $cart->totalPrice;
		//dd($totalPrice);
		return view('Website/shoppingCart')->with('product_details',$product_details)->with('totalPrice',$totalPrice);
	}

	public function getCheckout(){
		if(!Session::has('cart')){
			return redirect()->route('product.shoppingCart');
		}
		$oldCart = Session::get('cart');
		$cart = new Cart($oldCart);
		$products = $cart->items;
		$product_details = array();
		$i=0;
		foreach($products as $product){
			$product_details[$i]['item'] = $product['item'];
			$product_details[$i]['qty'] = $product['qty'];
			$product_details[$i]['price'] = $product['price'];
			$i++;
		}
		//dd($product_details);
		$totalPrice = $cart->totalPrice + 10;
		return view('Website/checkout')->with('product_details',$product_details)->with('totalPrice',$totalPrice);
	}
	
	public function postCheckout(Request $request){
		$user = Auth::user();
		$oldCart = Session::get('cart');
		$cart = new Cart($oldCart);
		
		if($user!=null){ // user logged in
		
			$rules = array(
	            'phone_number'    	=>  'required',
	            'address'    		=>  'required',
	            'email'             =>  'required|email|max:255',
	        );
			
			$messages = array(
	            'required'      	=> 'The field cannot be empty.',
	            'email'				=> 'Wrong Format.'
	        );
			
			$validator = Validator::make(Input::all(), $rules, $messages);
		
			if ($validator->fails()) {
	            $messages = $validator->messages();
	            // redirect our user back to the form with the errors from the validator
	            return redirect()->route('checkout')->withErrors($validator);
	        }
			
			else{
				$order = new Order();
				$order->cart = serialize($cart);
				$order->name = $request->name;
				$order->email = $request->email;
				$order->phone_number = $request->phone_number;
				$order->address = $request->address;
				$order->order_status = 'Order Received';
				
				$phn_substr = substr($order->phone_number , -3);
				$orders = Order::where('phone_number',$order->phone_number)->get();
				$check_if_empty = $orders->isEmpty();
				
				if($check_if_empty==true){
					$order->order_id = 'Order #'.$phn_substr.' - 1';
					Auth::user()->orders()->save($order);
					Mail::to($order->email)->send(new sendOrderInvoice($order));
					Session::forget('cart');
					return redirect()->route('deliveryConfirmation', [ 'order' => $order]);
				}
				
				else{
					$num_of_orders = count($orders);
					$order->order_id = 'Order #'.$phn_substr.' - '. ++$num_of_orders;
					Auth::user()->orders()->save($order);
					Mail::to($order->email)->send(new sendOrderInvoice($order));
					Session::forget('cart');
					return redirect()->route('deliveryConfirmation', [ 'order' => $order]);
				}
				
			}
			
		}
		
		else{ //user not logged in
		
			$check_account_add = $request->add_account;
			if($check_account_add=='1'){ // create new account and order
			
				$rules = array(
					'name'    			=>  'required',
		            'phone_number'    	=>  'required',
		            'address'    		=>  'required',
		            'email'             =>  'required|email|max:255|unique:users',
		            'password'          =>  'required',
		        );
				
				$messages = array(
		            'required'      => 'The field cannot be empty.',
		            'email'			=> 'Wrong Format.',
		            'unique'		=> 'Email Already Exists.'
		        );
				
				$validator = Validator::make(Input::all(), $rules, $messages);
			
				if ($validator->fails()) {
		            
		            $messages = $validator->messages();
		            // redirect our user back to the form with the errors from the validator
		            /*if($request->password==null){
		            	$password_status = 'empty';
		            }*/
		            return redirect()->route('checkout')->withErrors($validator);
		        }
				
				else{
					
					$user = User::create([
			            'name' => $request->name,
			            'email' => $request->email,
			            'password' => bcrypt($request->password),
			        ]);
					
					$order = new Order();
					$order->cart = serialize($cart);
					$order->name = $request->name;
					$order->email = $request->email;
					$order->phone_number = $request->phone_number;
					$order->address = $request->address;
					$order->order_status = 'Order Received';
					
					$phn_substr = substr($order->phone_number , -3);
					$orders = Order::where('phone_number',$order->phone_number)->get();
					$check_if_empty = $orders->isEmpty();
					if($check_if_empty==true){
						$order->order_id = 'Order #'.$phn_substr.' - 1';
						$user->orders()->save($order);
						Mail::to($order->email)->send(new sendOrderInvoice($order));
						Session::forget('cart');
						return redirect()->route('deliveryConfirmation', [ 'order' => $order]);
					}
					
					else{
						$num_of_orders = count($orders);
						$order->order_id = 'Order #'.$phn_substr.' - '. ++$num_of_orders;
						$user->orders()->save($order);
						Mail::to($order->email)->send(new sendOrderInvoice($order));
						Session::forget('cart');
						return redirect()->route('deliveryConfirmation', [ 'order' => $order]);
					}
					
				}
				
			}
			
			else{ // order without creating an account
			
				$rules = array(
		            'phone_number'    	=>  'required',
		            'address'    		=>  'required',
		            'email'             =>  'required|email|max:255',
		        );
				
				$messages = array(
		            'required'      => 'The field cannot be empty.',
		            'email'			=> 'Wrong Format.',
		            'unique'		=> 'Email Already Exists.'
		        );
				
				$validator = Validator::make(Input::all(), $rules, $messages);
			
				if ($validator->fails()) {
		            
		            $messages = $validator->messages();
		            // redirect our user back to the form with the errors from the validator
		            return redirect()->route('checkout')->withErrors($validator);
		        }
				
				else{
					$order = new Order();
					$order->cart = serialize($cart);
					$order->name = $request->name;
					$order->email = $request->email;
					$order->phone_number = $request->phone_number;
					$order->address = $request->address;
					$order->order_status = 'Order Received';
					
					$phn_substr = substr($order->phone_number , -3);
					$orders = Order::where('phone_number',$order->phone_number)->get();
					$check_if_empty = $orders->isEmpty();
					
					if($check_if_empty==true){
						$order->order_id = 'Order #'.$phn_substr.' - 1';
						$order->save();
						Mail::to($order->email)->send(new sendOrderInvoice($order));
						Session::forget('cart');
						return redirect()->route('deliveryConfirmation', [ 'order' => $order]);
					}
					
					else{
						$num_of_orders = count($orders);
						$order->order_id = 'Order #'.$phn_substr.' - '. ++$num_of_orders;
						$order->save();
						Mail::to($order->email)->send(new sendOrderInvoice($order));
						Session::forget('cart');
						return redirect()->route('deliveryConfirmation', [ 'order_id' => $order]);
					}
				}
			}
			
		}
		
	}

	public function deliveryConfirmation($order_id){
		$orders = Order::where('id',$order_id)->first();
		$shipping_details = $orders;
		$orders->cart = unserialize($orders->cart);
		
		$product_details = array();
		$orders = $orders['cart'];
		$total_price = $orders->totalPrice + 10;
		$orders = $orders->items;
		$i=0;
		foreach($orders as $order){
			$product_details[$i]['item'] = $order['item'];
			$product_details[$i]['qty'] = $order['qty'];
			$product_details[$i]['price'] = $order['price'];
			$i++;
		}
		return view('Website/deliveryConfirmation')->with('product_details',$product_details)->with('shipping_details',$shipping_details)->with('total_price',$total_price);
	}
	
	
	
	/***************** Package ******************************/
	
	public function getAddPackageToCart(Request $request, $id, $redirect_page, $dish_type)
    {
        $package = Package::find($id);
		
		if($dish_type=="Box"){
			$update_info = [
				'product_price'	=> $package->box_price
			];
		}
		else{
			$update_info = [
				'product_price'	=> $package->buffet_price
			];
		}
		
		Package::where('id', $id)->update($update_info);
		
		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);
		$cart->add($package, $package->package_unique_id);
		$request->session()->put('cart', $cart);
		//dd($request->session()->get('cart'));
		if($redirect_page=='product_details_page_for_programs'){
			return redirect('/product_details_page_for_programs/'.$package->id.'/'.$dish_type);
		}
    }	
	
}
