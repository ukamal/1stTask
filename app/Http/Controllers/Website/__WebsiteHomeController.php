<?php

namespace App\Http\Controllers\Website;


use Mail;
use App\Mail\sendCurriculumVitae;
use App\Mail\sendCustomerQuery;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Redirect;

class WebsiteHomeController extends Controller
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
    
    public function landingPage()
    {
    	$programs = \App\Program::all();
		$products = \App\Product::where('top_products','=',1)->with('product_gallery_images')->get();
		//dd($products);
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
  		return view('Website/websiteLandingPage')->with('programs',$programs)->with('product_details',$product_details);
    }
	
	public function productPage($category_id){
		$products = \App\Product::where('category_id',$category_id)->with('category','product_gallery_images')->get();
		$sub_category = \App\Category::where('id',$category_id)->first();
		$main_category = \App\Category::where('id',$sub_category->parent_id)->first();
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
			
		//dd($product_details);
		return view('Website/productPage')->with('product_details',$product_details)->with('main_category',$main_category);
	}
	
	public function productDetailsPage($product_id){
		$product_details = \App\Product::where('id',$product_id)->with('product_gallery_images')->get();
		foreach($product_details as $product){
			$category_id = $product->category_id;
		}
		$other_products = \App\Product::where('category_id',$category_id)->with('product_gallery_images')->get()->except($product_id);
		$check_if_empty = $other_products->isEmpty();
		//dd($check_if_empty);
		$sub_category = \App\Category::where('id',$category_id)->first();
		$main_category = \App\Category::where('id',$sub_category->parent_id)->first();
		return view('Website/productDetailsPage')->with('product_details',$product_details)->with('other_products',$other_products)->with('check_if_empty',$check_if_empty)
		->with('main_category',$main_category)->with('sub_category',$sub_category);
	}
	
	public function cartCheckoutPage()
    {
  		return view('Website/cartCheckoutPage');
    }
	
	public function productPageForPrograms($program_id,$dish_type){
		$program = \App\Program::where('id',$program_id)->first();
		$packages = \App\Package::where('program_id',$program_id)
                                        ->orderByRaw('LENGTH(package_name)', 'ASC')
                                        ->orderBy('package_name', 'ASC')
                                        ->get();
		$package_with_products = array();
		$i=0;
		foreach($packages as $package){
			$package_with_products[$i]['package_info'] = $package;
			$package_with_products[$i]['package_products'] = $package->package_products;
			$i++;
		}
		//dd($package_with_products);
		return view('Website/productPageForPrograms')->with('package_with_products',$package_with_products)->with('dish_type',$dish_type)->with('program',$program);
	}
	
	public function productDetailsPageForPrograms($package_id,$dish_type){
		$package = \App\Package::where('id',$package_id)->first();
		$program = \App\Program::where('id',$package->program_id)->first();
		$package_products = $package->package_products;
		//dd($package_products);
		$product_images = array();
		$i=0;
		foreach($package_products as $index => $products){
			$product = $products->product;
			$gallery_images = $product->product_gallery_images;
			$check_if_empty = $gallery_images->isEmpty();
			if($check_if_empty!=true){
				foreach($gallery_images as $index => $images){
					if($index<1){
						$product_images[$i]['images'] = $images->gallery_image;
					}
				}
			}
			else{
				$product_images[$i]['images'] = '';
			}
			$i++;
		}
		//dd($product_images);
		
		$other_package_with_products = array();
		$i=0;
		$other_packages = \App\Package::where('program_id',$package->program_id)->get()->except($package_id);
		foreach($other_packages as $other_package){
			$other_package_with_products[$i]['package_info'] = $other_package;
			$other_package_with_products[$i]['package_products'] = $other_package->package_products;
			$i++;
		}
		
		return view('Website/productDetailsPageForPrograms')->with('package_products',$package_products)->with('package',$package)
		->with('dish_type',$dish_type)->with('product_images',$product_images)->with('program',$program)->with('other_package_with_products',$other_package_with_products);
	}

	public function getPackageDetails(Request $request){
		return redirect('/product_details_page_for_programs/'.$request->package_id.'/'.$request->dish_type);
	}
	
	public function createCustomMenu($program_id,$dish_type){
		$program = \App\Program::where('id',$program_id)->first();
		$categories = \App\Category::where('parent_id','none')->get();
		return view('Website/createCustomMenu')->with('program',$program)->with('dish_type',$dish_type)->with('categories',$categories);
	}
	
	public function getSubCategories(Request $request){
		if($request->ajax()){
			$sub_categories = \App\Category::where('parent_id',$request->category_id)->get();
			return view('Website/ajaxSubCategory')->with('sub_categories',$sub_categories);	
		}
	}
	
	public function getSubCategoryProducts(Request $request){
		if($request->ajax()){
			$products = \App\Product::where('category_id',$request->sub_category_id)->with('product_gallery_images')->get();
			$check_if_empty = $products->isEmpty();
			return view('Website/ajaxSubCategoryProducts')->with('products',$products)->with('check_if_empty',$check_if_empty);	
		}
	}
	
	public function cartCheckoutInfoPage(){
		return view('Website/cartCheckoutInfoPage');
	}
	
	public function aboutUs(){
		return view('Website/aboutUs');
	}
	
	public function menuBook(){
		return view('Website/menuBook');
	}

	public function career(){
		return view('Website/career');
	}

	public function gallery(){
		$gallery_items = \App\Gallery::paginate(9);
		//dd($gallery_items);
		return view('Website/gallery')->with('gallery_items',$gallery_items);
	}

	public function submitCv(Request $request){
		
		$offset=6*60*60; //converting 5 hours to seconds.
        $dateFormat="Y/m/d";
        $temp_today_date = gmdate($dateFormat, time()+$offset);
		
		$curriculum_vitae = \App\CurriculumVitae::create([
			'curriculum_vitae_sent_date' 	=> $temp_today_date,
            'name'     						=> $request->name,
            'email'     					=> $request->email,
            'age' 							=> $request->age,
            'mobile_number' 				=> $request->mobile_number,
            'gender'     					=> $request->gender,
            'address'     					=> $request->address,
        ]);
		
		$curriculum_vitae_job_experiences = array();
            
        
        foreach($request['company'] as $index => $value) {
            $curriculum_vitae_job_experiences[] = new \App\CurriculumVitaeJobExperience([
                'company' 		=> $request['company'][$index],
                'job_title' 	=> $request['job_title'][$index],
                'years_of_exp' 	=> $request['years_of_exp'][$index],
            ]);
        }
	   
	   $curriculum_vitae->curriculum_vitae_job_experiences()->saveMany($curriculum_vitae_job_experiences);
        
	   $message = 'Your CV has been submitted successfully.';

	   //$mail_address = 's.wahab09@yahoo.com';
        $mail_addresses = [
            "po@salsa.com.bd",
            "admin@salsa.com.bd",
            "sohel@salsa.com.bd",
            "marketing@salsa.com.bd",
            "s.wahab@salsa.com.bd",
            "m.hossain@salsa.com.bd",
            "po@salsa.com.bd",
            "m.hossain@salsa.com.bd",
            "s.wahab09@salsa.com.bd",
            "liaquzzaman@salsa.com.bd",
            "wahidkhan@salsa.com.bd",
            "sohel@salsa.com.bd",
        ];

        // foreach ($mail_addresses as $mail_address) {
        //     Mail::to($mail_address)->send(new sendCurriculumVitae($curriculum_vitae));
        // }
        Mail::to($mail_addresses)->send(new sendCurriculumVita($curriculum_vitae));
	   
	   return redirect('career')->with('message',$message);
	   
	}
	
	public function contactUs(){
		return view('Website/contactUs');
	}
	
	public function submitQuery(Request $request){
		$offset=6*60*60; //converting 5 hours to seconds.
        $dateFormat="Y/m/d";
        $temp_today_date = gmdate($dateFormat, time()+$offset);
		
		$query = \App\Queries::create([
			'query_sent_date'	=> $temp_today_date,	
            'name'     			=> $request->name,
            'email'   	 		=> $request->email,
            'phone' 			=> $request->phone,
            'message' 			=> $request->message,
        ]);
		
        
	   $message = 'Thank you for your time. Your Query has been submitted successfully. We will get back to you soon.';
	   
	   $mail_addresses = [
            "po@salsa.com.bd",
            "admin@salsa.com.bd",
            "sohel@salsa.com.bd",
            "marketing@salsa.com.bd",
            "s.wahab@salsa.com.bd",
            "m.hossain@salsa.com.bd",
            "po@salsa.com.bd",
            "m.hossain@salsa.com.bd",
            "s.wahab09@salsa.com.bd",
            "liaquzzaman@salsa.com.bd",
            "wahidkhan@salsa.com.bd",
            "sohel@salsa.com.bd",
        ];
	   
	   Mail::to($mail_addresses)->send(new sendCustomerQuery($query));
	   
	   return redirect('contact_us')->with('message',$message);
	}
	
}
