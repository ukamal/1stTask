<?php

namespace App;

class Cart
{
	public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;
	
	public function __construct($oldCart){
		if($oldCart){
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice;
		}
	}
	
	public function add($item, $id, $quantity){
		$storedItem = [ 'qty' => 0, 'type' => 'product', 'price' => $item->product_price, 'item' => $item ];
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$storedItem = $this->items[$id];
			}
		}
		$storedItem['id'] = $id;
		$storedItem['qty'] = $storedItem['qty'] + $quantity;
		$storedItem['price'] = $item->product_price * $storedItem['qty'];
		$this->items[$id] = $storedItem;
		$this->totalQty +=  $quantity;
		$current_price = $item->product_price * $quantity;
		$this->totalPrice += $current_price;
	}
	
	public function subtract($item, $id, $quantity){
		$storedItem = [ 'qty' => 0, 'type' => 'product', 'price' => $item->product_price, 'item' => $item ];
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$storedItem = $this->items[$id];
			}
		}
		$storedItem['id'] = $id;
		$storedItem['qty'] = $storedItem['qty'] - $quantity;
		$storedItem['price'] = $item->product_price * $storedItem['qty'];
		$this->items[$id] = $storedItem;
		$this->totalQty -=  $quantity;
		$current_price = $item->product_price * $quantity;
		$this->totalPrice -= $current_price;
	}
	
	public function updateAddProduct($item, $id){
		$storedItem = $this->items[$id];
		$storedItem['qty'] = $storedItem['qty'] + 1;
		$storedItem['price'] = $item->product_price * $storedItem['qty'];
		$this->items[$id] = $storedItem;
		$this->totalQty +=  1;
		$this->totalPrice += $item->product_price;
	}
	
	public function updatesubtractProduct($item, $id){
		$storedItem = $this->items[$id];
		if($storedItem['qty']>1){
			$storedItem['qty']--;
			$storedItem['price'] = $item->product_price * $storedItem['qty'];
			$this->items[$id] = $storedItem;
			$this->totalQty--;
			$this->totalPrice -= $item->product_price;
		}
	}
	
	public function remove($item, $id){
		$storedItem = [ 'qty' => 0, 'price' => $item->product_price, 'item' => $item ];
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$storedItem = $this->items[$id];
			}
		}
		//dd($storedItem);
		$storedItem['price'] = $item->product_price * $storedItem['qty'];
		$this->totalQty -= $storedItem['qty'];
		$this->totalPrice -= $storedItem['price'];
		$storedItem['qty'] = 0;
		$storedItem['price'] = 0;
		$this->items[$id] = $storedItem;
	}
	
	/**************************** Package ******************************/
	
	public function addPackage($item, $id, $quantity, $package_type){
		$storedItem = [ 'qty' => 0, 'type' => 'package', 'package_type' => $package_type, 'price' => $item->product_price, 'item' => $item ];
		if($this->items){
			if(array_key_exists($id, $this->items)){
				$storedItem = $this->items[$id];
				//dd($storedItem);
			}
		}
		$storedItem['id'] = $id;
		$storedItem['qty'] = $storedItem['qty'] + $quantity;
		//dd($storedItem['qty']);
		$storedItem['price'] = $item->product_price * $storedItem['qty'];
		$this->items[$id] = $storedItem;
		$this->totalQty +=  $quantity;
		$current_price = $item->product_price * $quantity;
		//dd($current_price);
		$this->totalPrice += $current_price;
	}
	
	
	public function removePackage($id,$quantity,$package_price){
		$storedItem = $this->items[$id];
		$this->totalQty -= $quantity;
		$this->totalPrice -= $package_price;
		$storedItem['qty'] = 0;
		$storedItem['price'] = 0;
		$this->items[$id] = $storedItem;
	}
	
	
	public function updateAddPackage($id,$package_price){
		$storedItem = $this->items[$id];
		$storedItem['qty'] = $storedItem['qty'] + 1;
		$storedItem['price'] = $package_price * $storedItem['qty'];
		$this->items[$id] = $storedItem;
		$this->totalQty +=  1;
		$this->totalPrice += $package_price;
	}
	
	
	public function updateSubtractPackage($id,$package_price){
		$storedItem = $this->items[$id];
		if($storedItem['qty']>1){
			$storedItem['qty'] = $storedItem['qty'] - 1;
			$storedItem['price'] = $package_price * $storedItem['qty'];
			$this->items[$id] = $storedItem;
			$this->totalQty -=  1;
			$this->totalPrice -= $package_price;
		}
	}
	
	public function updateChangePackage($item, $id, $quantity){
		$storedItem = $this->items[$id];
		//dd($storedItem);
		if($quantity>0){
			if($storedItem['qty']>$quantity){
				$duduct_quantity  = $storedItem['qty'] - $quantity;
				$storedItem['qty'] = $storedItem['qty'] - $duduct_quantity;
				$storedItem['price'] = $storedItem['item']->product_price * $storedItem['qty'];
				$this->items[$id] = $storedItem;
				$this->totalQty -=  $duduct_quantity;
				$deduct_price = $storedItem['item']->product_price * $duduct_quantity;
				$this->totalPrice -= $deduct_price;
			}
			elseif($storedItem['qty']<$quantity){
				$added_quantity  = $quantity - $storedItem['qty'];
				$storedItem['qty'] = $storedItem['qty'] + $added_quantity;
				$storedItem['price'] = $storedItem['item']->product_price * $storedItem['qty'];
				$this->items[$id] = $storedItem;
				$this->totalQty +=  $added_quantity;
				$added_price = $storedItem['item']->product_price * $added_quantity;
				$this->totalPrice += $added_price;
			}
		}
	}
	
	/**************************** END ******************************/
	
	/**************************** Custom Menu ******************************/
	
	public function addCustomMenu($item, $id, $quantity, $total_price, $grand_total){
		$storedItem = [ 'type' => 'custom_menu', 'item' => $item ];
		$storedItem['id'] = $id;
		$storedItem['qty'] = $quantity;
		$storedItem['total_price'] = $total_price;
		$storedItem['grand_total'] = $grand_total;
		$storedItem['price'] = $grand_total;
		$this->items[$id] = $storedItem;
		$this->totalQty +=  $quantity;
		$this->totalPrice += $grand_total;
	}
	
	public function removeCustomMenu($id,$quantity,$custom_price){
		$storedItem = $this->items[$id];
		$this->totalQty -= $quantity;
		$this->totalPrice -= $custom_price;
		$storedItem['qty'] = 0;
		$storedItem['price'] = 0;
		$storedItem['total_price'] = 0;
		$storedItem['grand_total'] = 0;
		$this->items[$id] = $storedItem;
	}
	
	public function updateAddCustomMenu($id,$custom_menu_price){
		$storedItem = $this->items[$id];
		//dd($storedItem);
		$storedItem['qty'] = $storedItem['qty'] + 1;
		$storedItem['price'] = $custom_menu_price * $storedItem['qty'];
		$storedItem['grand_total'] = $custom_menu_price * $storedItem['qty'];
		$this->items[$id] = $storedItem;
		$this->totalQty +=  1;
		$this->totalPrice += $custom_menu_price;
	}
	
	
	public function updateSubtractCustomMenu($id,$custom_menu_price){
		$storedItem = $this->items[$id];
		//dd($storedItem);
		if($storedItem['qty']>1){
			$storedItem['qty'] = $storedItem['qty'] - 1;
			$storedItem['price'] = $custom_menu_price * $storedItem['qty'];
			$storedItem['grand_total'] = $custom_menu_price * $storedItem['qty'];
			$this->items[$id] = $storedItem;
			$this->totalQty -=  1;
			$this->totalPrice -= $custom_menu_price;
		}
	}
	
	public function updateChangeCustomMenu($item, $id, $quantity){
		$storedItem = $this->items[$id];
		//dd($storedItem);
		if($quantity>0){
			if($storedItem['qty']>$quantity){
				$duduct_quantity  = $storedItem['qty'] - $quantity;
				$storedItem['qty'] = $storedItem['qty'] - $duduct_quantity;
				$storedItem['price'] = $storedItem['total_price'] * $storedItem['qty'];
				$storedItem['grand_total'] = $storedItem['total_price'] * $storedItem['qty'];
				$this->items[$id] = $storedItem;
				$this->totalQty -=  $duduct_quantity;
				$deduct_price = $storedItem['total_price'] * $duduct_quantity;
				$this->totalPrice -= $deduct_price;
			}
			elseif($storedItem['qty']<$quantity){
				$added_quantity  = $quantity - $storedItem['qty'];
				$storedItem['qty'] = $storedItem['qty'] + $added_quantity;
				$storedItem['price'] = $storedItem['total_price'] * $storedItem['qty'];
				$storedItem['grand_total'] = $storedItem['total_price'] * $storedItem['qty'];
				$this->items[$id] = $storedItem;
				$this->totalQty +=  $added_quantity;
				$added_price = $storedItem['total_price'] * $added_quantity;
				$this->totalPrice += $added_price;
			}
		}
	}
	
	/**************************** END ******************************/
	
	
		
}
