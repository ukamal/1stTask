<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$todays_date = date("Y-m-d");
		//dd($todays_date);
		$todays_date_formatted = date('l, jS \of F Y', strtotime ($todays_date));
		$orders = \App\Order::whereDate('order_date_time',$todays_date)->get();
		//dd($todays_date_formatted);
		$all_orders = array();
		$i = 0;
		foreach($orders as $order){
			$all_orders[$i] = $order;
			$i++;
		}
		//dd($all_orders);
        return view('Admin/admin')->with('all_orders',$all_orders)->with('todays_date_formatted',$todays_date_formatted);
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
		return view('Admin/Orders/view_order_details')->with('product_details',$product_details)->with('package_details',$package_details)->with('custom_menu_details',$custom_menu_details)
		->with('totalPrice',$totalPrice)->with('order',$order);
	}
}
