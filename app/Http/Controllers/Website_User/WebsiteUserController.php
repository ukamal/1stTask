<?php

namespace App\Http\Controllers\Website_User;


use Auth;
use Hash;
use Session;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class WebsiteUserController extends Controller
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
    public function userAccount()
    {
  		return view('Website-User/account');
    }
	
	public function personalInformation(){
		return view('Website-User/personal_information');
	}
	
	public function changeAccountInformations(Request $request){
		$updated_info = [
            'name'    => $request->name,
            'email'   => $request->email,
        ];
        
        \App\User::where('id', $request->user_id)->update($updated_info);
        $update_message = 'User Informations Updated Successfully!!';
		return redirect('personal_information')->with('update_message',$update_message);
	}
	
	public function changeUserPasswordForm(){
		return view('Website-User/change_user_password_form');
	}
	
	public function changeUserPassword(Request $request){
		$hashedPassword = Auth::user()->password;
		$current_password = $request->current_password;
	    $rules = array(
	        'current_password'      => 'required',     // required and must be unique in the ducks table
	        'new_password'         	=> 'required',
	        'confirm_password' 		=> 'required|same:new_password'    // required and has to match the password field
	    );
		
		$messages = array(
	        'required' => 'The field cannot be empty.',
	        'same'     => 'Password does not match.'
	    );
		
		$validator = Validator::make(Input::all(), $rules, $messages);
		
		if ($validator->fails()) {
	        // get the error messages from the validator
	        $messages = $validator->messages();
	
	        // redirect our user back to the form with the errors from the validator
	        return Redirect::to('change_user_password_form')->withErrors($validator);
	
	    } else {
	        // validation successful ---------------------------
	
	        // enter data into database
	
	        // create the data
	        if (Hash::check($current_password , $hashedPassword)) {
	        	
			    $user_new_password = array();
				$user_new_password = [
					'password' => Hash::make(Input::get('new_password')),
				]; 
				
				\App\User::where('id',Auth::user()->id)->update($user_new_password);
				
				//Session::flash('message','Successfully changed password.');
	    		$message = 'Password Updated Successfully.';
		        // redirect ----------------------------------------
		        // redirect our user back to the form so they can do it all over again
		        return Redirect::to('change_user_password_form')->with('message',$message);
			}
			else {
				
			    $mismatch_message = 'Password does not match.';
				//dd($message);
				return Redirect::to('change_user_password_form')->with('mismatch_message',$mismatch_message);
				
			}
	    }
	}

	public function changeUserAddressForm(){
		return view('Website-User/change_user_address_form');
	}
	
	public function changeDeliveryAddress(Request $request){
		$updated_info = [
            'delivery_address'    => $request->delivery_address,
        ];
        
        \App\User::where('id', $request->user_id)->update($updated_info);
        $update_message = 'Delivery address updated Successfully!!';
		return redirect('change_user_address_form')->with('update_message',$update_message);
	}
	
	public function getUserOrders(){
		$user = Auth::user();
		$user_orders = $user->orders;
		$all_orders = array();
		$i = 0;
		foreach($user_orders as $orders){
			$all_orders[$i] = $orders;
			$i++;
		}
		//dd($all_orders);
		return view('Website-User/get_user_orders')->with('all_orders',$all_orders);
	}

	public function viewOrderDetails($order_id){
		$order = \App\Order::where('id',$order_id)->first();
		$cart = unserialize($order->cart);
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
				$j++;			
			}
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
		$totalPrice = $cart->totalPrice;
		$totalQuantity = $cart->totalQty;
		//dd($totalQuantity);
		return view('Website-User/view_order_details')->with('product_details',$product_details)->with('package_details',$package_details)->with('custom_menu_details',$custom_menu_details)
		->with('totalPrice',$totalPrice)->with('order',$order);
	}
	
}
