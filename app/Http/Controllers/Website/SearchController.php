<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function search(Request $request) {

        $query = trim($request->input('searchText'));
        $products = \App\Product::where('product_name','like','%'. $query .'%')->with('product_gallery_images')->get();

//        $categories = \App\Category::where('category_name', 'like', '%'. $query . '%')->get();
//
//        foreach ($categories as $category) {
//            $category->products;
//        }

        $product_details = array();
        $i=0;
        foreach($products as $product){
            $product_details[$i]['id'] = $product->id;
            $product_details[$i]['name'] = $product->product_name;
            $product_details[$i]['description'] = $product->product_description;
            $product_details[$i]['price'] = $product->product_price;
            $product_details[$i]['category_id'] = $product->category->id;
            $product_details[$i]['category_name'] = $product->category->category_name;
            $product_details[$i]['rating'] = $product->product_rating;
            foreach($product->product_gallery_images as $index => $product_images){
                if($index<1){
                    $product_details[$i]['image'] = $product_images->gallery_image;
                }
            }
            $i++;
        }

        return view('Website/searchResult')
            ->with('product_details',$product_details)
            ->with('query', $query);
    }

    public function autoCompleteSuggestion(Request $request) {
        $query = trim($request->input('term'));

        $product_list = [];

        if(!isset($query) || $query == '') {
            echo json_encode($product_list);
            exit;
        }

        $products = \App\Product::where('product_name','like','%'. $query .'%')->get();

        foreach ($products as $product) {
            array_push($product_list, [ 'id' => $product->id, 'value' => $product->product_name, 'label' => $product->product_name ]);
        }

        echo json_encode($product_list);
    }
}
