<?php

namespace App\Http\Controllers;

use App\Cart;
use App\User;
use App\Product;
use App\Order;
use App\Category;
use App\Package;
use App\PackageProducts;
use App\Program;
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
    
    public function getAddToCart(Request $request)
    {
        $product = Product::find($request->id);
		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);
		$product_id = 'Product'.'-'.$request->id;
		$cart->add($product, $product_id, $request->quantity);
		$request->session()->put('cart', $cart);
		//dd($request->session()->get('cart'));
		if($request->redirect_page=='product_details_page'){
			return redirect('/product_details_page/'.$product->id);
		}
		elseif($request->redirect_page=='shopping-cart'){
			return redirect('/shopping-cart');
		}
		elseif($request->redirect_page=='product_page'){
			return redirect('/product_page/'.$product->category_id);
		}
		elseif($request->redirect_page=='/'){
			return redirect('/');
		}
		
    }
	
	public function getUpdateAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);
		$product_id = 'Product'.'-'.$id;
		$cart->updateAddProduct($product, $product_id);
		$request->session()->put('cart', $cart);
		return redirect('/shopping-cart');
    }
	
	public function getUpdateSubtractToCart(Request $request, $id){
		$product = Product::find($id);
		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);
		$product_id = 'Product'.'-'.$id;
		$cart->updatesubtractProduct($product, $product_id);
		$request->session()->put('cart', $cart);
		return redirect('/shopping-cart');
		
	}
	
	
	public function getUpdateChangeToCart(Request $request){
		if($request->product_quantity!=null){
			$product = Product::find($request->id);
			$oldCart = Session::has('cart') ? Session::get('cart') : null;
			$cart = new Cart($oldCart);
			$product_id = 'Product'.'-'.$request->id;
			foreach($cart->items as $cart_item){
				if($cart_item['id']==$product_id){
					$product_cart = $cart_item;
				}
			}
			//dd($product);
			if($request->product_quantity>0){
				if($product_cart['qty']>$request->product_quantity){
					$duduct_quantity  = $product_cart['qty'] - $request->product_quantity;
					$cart->subtract($product, $product_id, $duduct_quantity);
					$request->session()->put('cart', $cart);
					return redirect('/shopping-cart');
				}
				elseif($product_cart['qty']<$request->product_quantity){
					$add_quantity  = $request->product_quantity - $product_cart['qty'];
					$cart->add($product, $product_id, $add_quantity);
					$request->session()->put('cart', $cart);
					return redirect('/shopping-cart');
				}
			}
			
			else{
				return redirect('/shopping-cart');
			}
		}
		else{
			return redirect('/shopping-cart');
		}
		
	}
	
	
	public function getRemoveFromCart(Request $request, $id, $redirect_page){
		$product = Product::find($id);
		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);
		$product_id = 'Product'.'-'.$id;
		$cart->remove($product, $product_id);
		$request->session()->put('cart', $cart);
		//dd($request->session()->get('cart'));
		if($redirect_page=='product_details_page'){
			return redirect('/product_details_page/'.$product->id);
		}
		elseif($redirect_page=='shopping-cart'){
			return redirect('/shopping-cart');
		}
		
	}
	
	
	public function getRemovePackageFromCart(Request $request, $id, $quantity, $package_price, $redirect_page){
		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);
		$cart->removePackage($id,$quantity,$package_price);
		$request->session()->put('cart', $cart);
		return redirect('/shopping-cart');
	}
	
	public function getRemoveCustomMenuFromCart(Request $request, $id, $quantity, $custom_price, $redirect_page){
		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);
		$cart->removeCustomMenu($id,$quantity,$custom_price);
		$request->session()->put('cart', $cart);
		return redirect('/shopping-cart');
	}
	
	
	
	public function getCart(){
		if(!Session::has('cart')){
			$totalPrice = 0;
			return view('Website/shoppingCart')->with('totalPrice',$totalPrice);
		}
		$oldCart = Session::get('cart');
		$cart = new Cart($oldCart);
		$cart_items = $cart->items;
		//dd($cart_items);
		$product_details = array();
		$package_details = array();
		$custom_menu_details = array();
		$i=0;
		$j=0;
		$k=0;
		foreach($cart_items as $cart_item){
			if($cart_item['type'] == "package"){
				$package_details[$j]['id'] = $cart_item['id'];
				$package_details[$j]['item'] = $cart_item['item'];
				$package_details[$j]['products'] = $cart_item['item']->package_products;
				$package_details[$j]['qty'] = $cart_item['qty'];
				$package_details[$j]['price'] = $cart_item['price'];
				$package_details[$j]['package_type'] = $cart_item['package_type'];
				$j++;			
			}
			elseif($cart_item['type'] == "product"){
				$product_details[$i]['id'] = $cart_item['id'];
				$product_details[$i]['item'] = $cart_item['item']->load('product_gallery_images','category');
				$product_details[$i]['qty'] = $cart_item['qty'];
				$product_details[$i]['price'] = $cart_item['price'];
				$i++;
			}
			elseif($cart_item['type'] == "custom_menu"){
				$custom_menu_details[$k]['id'] = $cart_item['id'];
				$custom_menu_details[$k]['item'] = $cart_item['item'];
				$custom_menu_details[$k]['qty'] = $cart_item['qty'];
				$custom_menu_details[$k]['total_price'] = $cart_item['total_price'];
				$custom_menu_details[$k]['grand_total'] = $cart_item['grand_total'];
				$k++;
			}
		}
		//dd($custom_menu_details);
		
		/*  Formula Added for the service charge and vat
			$subtotal = $cart->totalPrice;
			$service_charge = intval((10/100) * $subtotal);
			$vat = intval((15/100) * $subtotal);
			$totalPrice = $subtotal + $service_charge + $vat; 
		*/
		
		$subtotal = $cart->totalPrice;
		
		
		$totalPrice = $subtotal;
		
		return view('Website/shoppingCart')->with('product_details',$product_details)->with('package_details',$package_details)->with('custom_menu_details',$custom_menu_details)
		->with('totalPrice',$totalPrice)->with('subtotal',$subtotal);
	}

	public function getCheckout(){
		
		if(!Session::has('cart')){
			return redirect()->route('product.shoppingCart');
		}
		$oldCart = Session::get('cart');
		$cart = new Cart($oldCart);
		$cart_items = $cart->items;
		$product_details = array();
		$package_details = array();
		$custom_menu_details = array();
		$i=0;
		$j=0;
		$k=0;
		foreach($cart_items as $cart_item){
			if($cart_item['type'] == "package"){
				$package_details[$j]['item'] = $cart_item['item'];
				$package_details[$j]['products'] = $cart_item['item']->package_products;
				$package_details[$j]['qty'] = $cart_item['qty'];
				$package_details[$j]['price'] = $cart_item['price'];
				$package_details[$j]['package_type'] = $cart_item['package_type'];
				$j++;			}
			elseif($cart_item['type'] == "product"){
				$product_details[$i]['item'] = $cart_item['item']->load('product_gallery_images','category');
				$product_details[$i]['qty'] = $cart_item['qty'];
				$product_details[$i]['price'] = $cart_item['price'];
				$i++;
			}
			elseif($cart_item['type'] == "custom_menu"){
				$custom_menu_details[$k]['item'] = $cart_item['item'];
				$custom_menu_details[$k]['qty'] = $cart_item['qty'];
				$custom_menu_details[$k]['total_price'] = $cart_item['total_price'];
				$custom_menu_details[$k]['grand_total'] = $cart_item['grand_total'];
				$k++;
			}
		}
		//dd($product_details);
		
		/*
			$subtotal = $cart->totalPrice;
			$service_charge = intval((10/100) * $subtotal);
			$vat = intval((15/100) * $subtotal);
			$totalPrice = $subtotal + $service_charge + $vat;
		*/
		
		$subtotal = $cart->totalPrice;
		
		
		$totalPrice = $subtotal;
		
		return view('Website/checkout')->with('product_details',$product_details)->with('package_details',$package_details)->with('custom_menu_details',$custom_menu_details)
		->with('totalPrice',$totalPrice)->with('subtotal',$subtotal);
	}
	
	public function postCheckout(Request $request){
		$user = Auth::user();
		$oldCart = Session::get('cart');
		$cart = new Cart($oldCart);
		
		$offset=6*60*60; //converting 5 hours to seconds.
        $dateFormat="Y/m/d";
        $temp_today_date = gmdate($dateFormat, time()+$offset);
		$temp_today_time = gmdate("H:i:s", time()+$offset);
		$temp_today_date_time = $temp_today_date.' '.$temp_today_time;
		
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
				$order->order_date_time = $temp_today_date_time;
				
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
					$order->order_date_time = $temp_today_date_time;
					
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
					$order->order_date_time = $temp_today_date_time;
					
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
		$package_details = array();
		$custom_menu_details = array();
		$orders = $orders['cart'];
		$subtotal = $orders->totalPrice;
		//$service_charge = intval((10/100) * $subtotal);
		//$vat = intval((15/100) * $subtotal);
		//$totalPrice = $subtotal + $service_charge + $vat;
		$totalPrice = $subtotal;
		$orders = $orders->items;
		$i=0;
		$j=0;
		$k=0;
		foreach($orders as $order){
			if($order['type']=="package"){
				$package_details[$j]['item'] = $order['item'];
				$package_details[$j]['products'] = $order['item']->package_products;
				$package_details[$j]['qty'] = $order['qty'];
				$package_details[$j]['price'] = $order['price'];
				$package_details[$j]['package_type'] = $order['package_type'];
				$j++;	
			}
			elseif($order['type']=="product"){
				$product_details[$i]['item'] = $order['item'];
				$product_details[$i]['qty'] = $order['qty'];
				$product_details[$i]['price'] = $order['price'];
				$i++;
			}
			elseif($order['type'] == "custom_menu"){
				$custom_menu_details[$k]['item'] = $order['item'];
				$custom_menu_details[$k]['qty'] = $order['qty'];
				$custom_menu_details[$k]['total_price'] = $order['total_price'];
				$custom_menu_details[$k]['grand_total'] = $order['grand_total'];
				$k++;
			}
		}
		return view('Website/deliveryConfirmation')->with('product_details',$product_details)->with('package_details',$package_details)->with('custom_menu_details',$custom_menu_details)
		->with('shipping_details',$shipping_details)->with('totalPrice',$totalPrice)->with('subtotal',$subtotal);
	}
	
	
	
	/***************** Package ******************************/
	
	public function getAddPackageToCart(Request $request)
    {
        $package = Package::find($request->id);
		
		$program = Program::where('id',$package->program_id)->first();
		//dd($program);
		
		if($request->dish_type=="Box"){
			$update_info = [
				'product_price'	=> $package->box_price
			];
		}
		else{
			$update_info = [
				'product_price'	=> $package->buffet_price
			];
		}
		
		Package::where('id', $package->id)->update($update_info);
		
		$package = Package::find($request->id);
		
		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);
		$cart_package_id = 'Package'.'-'.$package->id.'-'.$request->dish_type;
		$package_type = $request->dish_type;
		$cart->addPackage($package, $cart_package_id,$request->quantity, $package_type);
		$request->session()->put('cart', $cart);
		//dd($request->session()->get('cart'));
		if($request->redirect_page=='product_details_page_for_programs'){
			return redirect('/product_details_page_for_programs/'.$package->id.'/'.$request->dish_type)->with('program',$program);
		}
		elseif($request->redirect_page=='product_page_for_programs'){
			return redirect('/product_page_for_programs/'.$program->id.'/'.$request->dish_type)->with('program',$program);
		}
    }

	
	public function getUpdatePackageAddToCart(Request $request, $id, $package_price)
    {
		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);
		$cart->updateAddPackage($id, $package_price);
		$request->session()->put('cart', $cart);
		return redirect('/shopping-cart');
    }	
	
	public function getUpdatePackageSubtractToCart(Request $request, $id, $package_price)
    {
		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);
		$cart->updateSubtractPackage($id, $package_price);
		$request->session()->put('cart', $cart);
		return redirect('/shopping-cart');
    }

	public function getUpdatePackageChangeToCart(Request $request){
		if($request->package_quantity!=null){
			$oldCart = Session::has('cart') ? Session::get('cart') : null;
			$cart = new Cart($oldCart);
			$package_id = $request->id;
			foreach($cart->items as $cart_item){
				if($cart_item['id']==$package_id){
					$package_cart = $cart_item;
				}
			}
			//dd($package_cart);
			$cart->updateChangePackage($package_cart,$request->id,$request->package_quantity);
			$request->session()->put('cart', $cart);
			return redirect('/shopping-cart');
		}
		else{
			return redirect('/shopping-cart');
		}
		
	}


	/************************** END ********************************************/
	
	
	/***************** Custom Menu ******************************/

	public function getAddCustomMenuToCart(Request $request){
		$products = array();
		foreach($request->product_id as $product_id){
			$products[] = Product::where('id',$product_id)->first();
		}
		$quantity = $request->menu_quantity;
		$grand_total = $request->grand_total;
		$total_price = $request->total_price_input;
		$offset=6*60*60; //converting 5 hours to seconds.
        $dateFormat="Y/m/d";
        $temp_today_date = gmdate($dateFormat, time()+$offset);
		$temp_today_time = gmdate("H:i:s", time()+$offset);
		//$custom_menu_id = $temp_today_date.'-'.$temp_today_time.'-'.$total_price.'-'.$quantity.'-'.$grand_total;
		$custom_menu_id = "Custom-Menu-".strtotime($temp_today_date.' '.$temp_today_time);
		//dd($custom_menu_id);
		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);
		$cart->addCustomMenu($products, $custom_menu_id, $quantity, $total_price, $grand_total);
		$request->session()->put('cart', $cart);
		if($request->redirect_page=='create_custom_menu'){
			return redirect('/create_custom_menu/'.$request->program_id.'/'.$request->dish_type);
		}
	}


	public function getUpdateCustomMenuAddToCart(Request $request, $id, $custom_menu_price)
    {
		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);
		$cart->updateAddCustomMenu($id, $custom_menu_price);
		$request->session()->put('cart', $cart);
		return redirect('/shopping-cart');
    }
	
	public function getUpdateCustomMenuSubtractToCart(Request $request, $id, $custom_menu_price)
    {
		$oldCart = Session::has('cart') ? Session::get('cart') : null;
		$cart = new Cart($oldCart);
		$cart->updateSubtractCustomMenu($id, $custom_menu_price);
		$request->session()->put('cart', $cart);
		return redirect('/shopping-cart');
    }


	public function getUpdateCustomMenuChangeToCart(Request $request){
		if($request->custom_menu_quantity!=null){
			$oldCart = Session::has('cart') ? Session::get('cart') : null;
			$cart = new Cart($oldCart);
			$custom_menu_id = $request->id;
			foreach($cart->items as $cart_item){
				if($cart_item['id']==$custom_menu_id){
					$custom_menu_cart = $cart_item;
				}
			}
			//dd($package_cart);
			$cart->updateChangeCustomMenu($custom_menu_cart,$request->id,$request->custom_menu_quantity);
			$request->session()->put('cart', $cart);
			return redirect('/shopping-cart');
		}
		else{
			return redirect('/shopping-cart');
		}
		
	}

	/************************ END ******************************/
	
}
