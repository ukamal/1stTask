<?php
/**
 * Created by PhpStorm.
 * User: onik
 * Date: 3/20/18
 * Time: 10:14 AM
 */

namespace App\Http\Controllers\Admin;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;

class AdminClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function clientList() {
        $clients = Client::all();

        return view('Admin/Client/client_list')->with('clients', $clients);
    }

    public function addClient() {
        return view('Admin/Client/addClient');
    }

    public function deleteClient($client_id) {
        $client = Client::find($client_id);

        $client->delete();

        return back()->with('client_list_msg', $client->client_name . ' is deleted');
    }

    public function submitClientInfo(Request $request) {
        $this->validate($request, [
            'clientLogo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'clientName' => 'required',
        ]);

        $image = $request->file('clientLogo');

        if($image){
            $imageName = $image->getClientOriginalName();
            $upload = 'images/clients';
            $image->move($upload, $imageName);

            $client = new Client;
            $client->client_name = $request->input('clientName');
            $client->client_image = $imageName;

            $client->save();
        }

        return back()->with('success','Client Saved');
    }

    public function editClient(Request $request) {
        $this->validate($request, [
            'clientName' => 'required',
        ]);

        $client = Client::find($request->input('client_id'));
        $client->client_name = $request->input('clientName');

        $image = $request->file('clientLogo');

        if($image){
            $imageName = $image->getClientOriginalName();
            $upload = 'images/clients';
            $image->move($upload, $imageName);

            $client->client_image = $imageName;
        }

        $client->save();

        return back()->with('client_list_msg', $client->client_name . ' is updated');
    }
	
	
	
	public function viewRegisteredClientsList() {
        $registered_clients_list = \App\Order::all();
		$registered_clients_list = $registered_clients_list->unique('user_id')->values()->all(); 
		//dd($registered_clients_list);
		return view('Admin/Customers/registered_clients_list')->with('registered_clients_list',$registered_clients_list);
    }
	
	public function viewRegisteredClientsOrdersList($user_id) {
        $orders = \App\Order::where('user_id',$user_id)->get();
		//dd($orders);
		$all_orders = array();
		$i = 0;
		foreach($orders as $order){
			$all_orders[$i] = $order;
			$i++;
		}
		//dd($all_orders);
        return view('Admin/Customers/registered_clients_orders_list')->with('all_orders',$all_orders)->with('user_id',$user_id);
    }
	
	public function viewRegisteredClientsOrderDetails($order_id,$user_id){
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
		return view('Admin/Customers/registered_clients_order_details')->with('product_details',$product_details)->with('package_details',$package_details)->with('custom_menu_details',$custom_menu_details)
		->with('totalPrice',$totalPrice)->with('order',$order)->with('user_id',$user_id);
	}

	public function viewUnregisteredClientsList() {
        $unregistered_clients_list = \App\Order::where('user_id',NULL)->get();
		//dd($unregistered_clients_list);
		return view('Admin/Customers/unregistered_clients_list')->with('unregistered_clients_list',$unregistered_clients_list);
    }
	
	public function viewUnregisteredClientsOrdersDetails($primary_id){
		$order = \App\Order::where('id',$primary_id)->first();
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
		return view('Admin/Customers/unregistered_clients_order_details')->with('product_details',$product_details)->with('package_details',$package_details)->with('custom_menu_details',$custom_menu_details)
		->with('totalPrice',$totalPrice)->with('order',$order);
	}
	
}