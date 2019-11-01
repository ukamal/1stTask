<?php

namespace App\Mail;

use App\Order;
use App\Cart;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendOrderInvoice extends Mailable
{
    use Queueable, SerializesModels;
	
	public $orders = null;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $orders)
    {
        $this->orders = $orders;
		$orders->cart = unserialize($orders->cart);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
    	$orders = $this->orders;
		
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
		
		//dd($product_details);
        return $this->markdown('emails.user.sendorderinvoice')->with('product_details',$product_details)->with('package_details',$package_details)->with('custom_menu_details',$custom_menu_details)
        ->with('totalPrice',$totalPrice)->with('subtotal',$subtotal);
    }
}
