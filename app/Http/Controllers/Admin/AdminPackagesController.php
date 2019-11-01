<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class AdminPackagesController extends Controller
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
    public function packageList()
    {
    	$programs_list = \App\Program::all();
        return view('Admin/Packages/package_list')->with('programs_list',$programs_list);
    }

	public function addNewPackage()
    {
    	$programs_list = \App\Program::all();
		$products_list = \App\Product::all();
        return view('Admin/Packages/add_new_package')->with('products_list',$products_list)->with('programs_list',$programs_list);
    }
	
	public function createPackage(Request $request){
		
       $package = \App\Package::create([
            'program_id'     	=> $request->program_id,
            'package_name'     	=> $request->package_name,
            'product_price'     => $request->box_price,
            'box_price'     	=> $request->box_price,
            'buffet_price'     	=> $request->buffet_price,
        ]);
		
		$package_id = $package->id;
		
		$package_unique_id = "Package"."-".$package_id;
		
		$update_info = [
			'package_unique_id'	=> $package_unique_id
		];
		
		\App\Package::where('id', $package_id)->update($update_info);
		
		
		$package_products = array();
            
        if($request['product_id']!="null"){
            foreach($request['product_id'] as $index => $value) {
            	if($value!="none"){
	                $package_products[] = new \App\PackageProducts([
	                    'product_id'       => $request ['product_id'][$index],
	                ]);
				}
            }
        }
        
       $package->package_products()->saveMany($package_products);
        
	   $message = 'Package created Successfully !!!';
	   return redirect('admin/add_new_package')->with('message',$message);
	}
	
	public function getPackagesForProgram(Request $request){
		$packages_list = \App\Package::where('program_id', $request->program_id)->get();
		$programs_list = \App\Program::all();
		return view('Admin/Packages/package_list')->with('programs_list',$programs_list)->with('packages_list',$packages_list)->with('program_id',$request->program_id);
	}
	
	public function getPackagesListForProgram($program_id){
		$packages_list = \App\Package::where('program_id', $program_id)->get();
		$programs_list = \App\Program::all();
		return view('Admin/Packages/package_list')->with('programs_list',$programs_list)->with('packages_list',$packages_list)->with('program_id',$program_id);
	}
	
	public function updatePackageInformation(Request $request){
		$updated_info = [
            'package_name'     	=> $request->update_package_name,
            'product_price'    	=> $request->update_box_price,
            'box_price'     	=> $request->update_box_price,
            'buffet_price'     	=> $request->update_buffet_price,
        ];
        
        \App\Package::where('id', $request->update_package_id)->update($updated_info);
        $programs_list = \App\Program::all();
        $update_message = 'Package Updated Successfully!!';
        return redirect('admin/get_packages_list_for_program/'.$request->program_id)->with('update_message',$update_message);
	}
	
	public function deletePackage(Request $request){
		$previous_info = \App\Package::find($request->delete_package_id);
        \App\Package::where('id',$request->delete_package_id)->delete();
		\App\PackageProducts::where('package_id',$request->delete_package_id)->delete();
		$deleted_message = 'Package '.$previous_info->package_name.' '. 'deleted successfully !!!';
        return redirect('admin/get_packages_list_for_program/'.$request->delete_program_id)->with('deleted_message',$deleted_message);
	}
	
	public function getProductsForPackage($package_id){
		$package = \App\Package::where('id',$package_id)->first();
		$package_products = \App\PackageProducts::where('package_id',$package_id)->with('product')->get();
		//dd($package_products);
		$products_list = \App\Product::all();
		return view('Admin/Packages/products_for_package')->with('package_products',$package_products)->with('package',$package)->with('products_list',$products_list)
		->with('package_id',$package_id)->with('program_id',$package->program_id);
	}

	public function changeProductForPackage(Request $request){
		$updated_info = [
            'product_id' => $request->product_id,
        ];
        
        \App\PackageProducts::where('id', $request->package_product_id)->update($updated_info);
        $update_message = 'Product Changed Successfully!!';
        return redirect('admin/get_products_for_package/'.$request->package_id)->with('update_message',$update_message);
	}
	
	public function removeProductFromPackage(Request $request){
		\App\PackageProducts::where('id', $request->delete_package_product_id)->delete();
        $deleted_message = 'Product removed Successfully!!';
        return redirect('admin/get_products_for_package/'.$request->package_id)->with('deleted_message',$deleted_message);
	}
	
	public function addProductForPackage(Request $request){
		
		$package = \App\Package::where('id',$request->package_id)->first();
		
		$package_products = array();
            
        if($request['add_product_id']!="null"){
            foreach($request['add_product_id'] as $index => $value) {
            	if($value!="none"){
	                $package_products[] = new \App\PackageProducts([
	                    'product_id'  => $request ['add_product_id'][$index],
	                ]);
				}
            }
        }
        
       $package->package_products()->saveMany($package_products);
        
	   $added_message = 'New products created Successfully !!!';
	   return redirect('admin/get_products_for_package/'.$request->package_id)->with('added_message',$added_message);
	}
	
}
