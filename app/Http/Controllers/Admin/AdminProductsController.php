<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class AdminProductsController extends Controller
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
    public function allProducts()
    {
		$products = \App\Product::with('product_gallery_images')->get();
		$product_details = array();
		$i=0;
		foreach($products as $product){
// 			$product_details[$i]['id'] = $product->id;
// 			$product_details[$i]['name'] = $product->product_name;
// 			$product_details[$i]['price'] = $product->product_price;
// 			$product_details[$i]['category_id'] = $product->category_id;
// 			$product_details[$i]['sub_category'] = $product->category->category_name;
// 			$main_category = \App\Category::where('id',$product->category->parent_id)->first();
// 			$product_details[$i]['main_category'] = $main_category->category_name;
// 			$product_details[$i]['rating'] = $product->product_rating;
// 			$product_details[$i]['description'] = $product->product_description;
// 			$product_details[$i]['top_products'] = $product->top_products;
// 			foreach($product->product_gallery_images as $index => $product_images){
// 				if($index<1){
// 					$product_details[$i]['image'] = $product_images->gallery_image;
// 				}
// 			}
// 			$i++;

            $product_details[$i]['id'] = $product['id'];
			$product_details[$i]['name'] = $product['product_name'];
			$product_details[$i]['price'] = $product['product_price'];
			$product_details[$i]['category_id'] = $product['category_id'];
			$product_details[$i]['sub_category'] = $product['category']['category_name'];
			$main_category = \App\Category::where('id',$product['category']['parent_id'])->first();
			$product_details[$i]['main_category'] = $main_category['category_name'];
			$product_details[$i]['rating'] = $product['product_rating'];
			$product_details[$i]['description'] = $product['product_description'];
			$product_details[$i]['top_products'] = $product['top_products'];
			foreach($product['product_gallery_images'] as $index => $product_images){
				if($index<1){
					$product_details[$i]['image'] = $product_images['gallery_image'];
				}
			}
			$i++;
		}		
		//dd($product_details);
        return view('Admin/Products/all_products')->with('product_details',$product_details);
    }
	
	public function addNewProductForm()
    {
    	$categories_list = \App\Category::where('parent_id','none')->get();
		$tags_list = \App\Tag::all();
        return view('Admin/Products/add_new_product_form')->with('categories_list',$categories_list)
		->with('tags_list',$tags_list);
    }
	
	public function getSubCategoryList(Request $request){
		if($request->ajax()){
            $sub_category_list = \App\Category::where('parent_id',$request->category_id)->get();
            //dd($check_if_empty);
            return view('Admin/Products/ajax_sub_category_dropdown_list')
            ->with('sub_category_list',$sub_category_list);
        }
	}
	
	public function createProduct(Request $request){
        
       $product = \App\Product::create([
       		'product_rating'    		=> $request->product_rating,
            'product_name'    			=> $request->product_name,
            'product_price'    			=> $request->product_price,
            'top_products'    			=> $request->top_products,
            'product_description'    	=> $request->product_description,
            'category_id'     			=> $request->category_id,
        ]);
		
        //$message = 'Product created Successfully !!!';
        return redirect('admin/add_product_gallery_images/'.$product->id);
	}
	
	public function addProductGalleryImages($product_id){
		$products = \App\Product::where('id',$product_id)->first();
		return view('Admin/Products/add_product_gallery_images')->with('product_id',$product_id)->with('products',$products);
	}
	
	public function deleteProduct($product_id){
		$previous_product_info = \App\Product::find($product_id);
		$previous_product_images_info = $previous_product_info->product_gallery_images;
		$check_if_empty = $previous_product_images_info->isEmpty();
		if($check_if_empty==false){
			foreach($previous_product_images_info as $previous_image){
				$upload = 'images/Product Gallery Images';
            	File::Delete($upload."/".$previous_image->gallery_image);
			}
		}
        \App\Product::where('id',$product_id)->delete();
		\App\ProductGalleryImages::where('product_id',$product_id)->delete();
		\App\PackageProducts::where('product_id',$product_id)->delete();
		$deleted_message = $previous_product_info->product_name.' '. 'deleted successfully !!!';
        return redirect('admin/all_products')->with('deleted_message',$deleted_message);
	}
	
	public function updateProduct(Request $request){
		$update_info = [
            'product_name'    		=> $request->product_name,
            'product_price'     	=> $request->product_price,
            'product_rating'     	=> $request->product_rating,
            'product_description'   => $request->product_description,
            'top_products'     		=> $request->top_products,
        ];
		\App\Product::where('id',$request->product_id)->update($update_info);
		$update_message = 'Product Information updated successfully !!!';
		return redirect('admin/all_products')->with('update_message',$update_message);
	}
	
	public function viewProductGalleryImages($product_id){
		$products = \App\Product::where('id',$product_id)->first();
		$gallery_images = $products->product_gallery_images;
		//dd($gallery_images);
		return view('Admin/Products/view_product_gallery_images')->with('product_id',$product_id)->with('products',$products)
		->with('gallery_images',$gallery_images);
	}
	
	public function deleteProductGalleryImage(Request $request){
			
		$upload = 'images/Product Gallery Images';
    	File::Delete($upload."/".$request->product_gallery_image_name);       
		\App\ProductGalleryImages::where('id',$request->product_gallery_image_id)->delete();
		$deleted_message = 'Image deleted successfully !!!';
        return redirect('admin/view_product_gallery_images/'.$request->product_id)->with('deleted_message',$deleted_message);
		
	}
	
	public function uploadProductGalleryImages(Request $request){
		$product_id = $request->product_id;
		$product = \App\Product::find($request->product_id);
		$image = $request->file('file');
		
		if($image){
			$imageName = $image->getClientOriginalName();
			$upload = 'images/Product Gallery Images';
			$image->move($upload,$imageName);
			//$imagePath = public_path("images/Product Gallery Images/$imageName");
			$product->product_gallery_images()->create(['gallery_image' => $imageName]);
		}
		
	}

	public function updateProductGalleryImage(Request $request){
		$image = $request->file('update_product_image');
        if($image!=null){
            $previous_info = \App\ProductGalleryImages::find($request->update_product_gallery_image_id);
            $upload = 'images/Product Gallery Images';
            File::Delete($upload."/".$previous_info->gallery_image);
            $imageName = $image->getClientOriginalName();
            $image->move($upload,$imageName);
            $updated_info['gallery_image'] =  $imageName;
			\App\ProductGalleryImages::where('id', $request->update_product_gallery_image_id)->update($updated_info);
			$update_message = 'Image updated successfully !!!';
			return redirect('admin/view_product_gallery_images/'.$request->update_product_id)->with('update_message',$update_message);
        }
		else{
			return redirect('admin/view_product_gallery_images/'.$request->update_product_id);
		}		
	}
	
	public function categoryList()
    {
    	$categories_list = \App\Category::all();
		//$categories_list = $categories_list->groupBy('category_slug');
		//dd($categories_list);
        return view('Admin/Products/category_list')->with('categories_list',$categories_list);
    }
	
	public function addNewCategoryForm()
    {
    	$categories_list = \App\Category::all();
		//$categories_list = $categories_list->groupBy('category_slug');
		//dd($categories_list);
        return view('Admin/Products/add_new_category')->with('categories_list',$categories_list);
    }
	
	public function createCategory(Request $request){
        $image = $request->file('category_image');
        $upload = 'images/Categories';
        if($image==null){
            $imageName = '';
        }
        else{
            $imageName = $request->category_slug.'_'.rand().'.'. $image->getClientOriginalExtension();
            $image->move($upload,$imageName);
        }
        
       \App\Category::create([
            'category_image'    => $imageName,
            'category_name'     => $request->category_name,
            'category_slug'     => $request->category_slug,
            'parent_id'     	=> $request->parent_id,
        ]);
        
        $message = 'Category created Successfully !!!';
        return redirect('admin/add_new_category_form')->with('message',$message);
	}
	
	public function deleteCategory(Request $request){
		$previous_info = \App\Category::find($request->delete_category_id);
        if($previous_info->category_image!=null){
            $upload = 'images/Categories';
            File::Delete($upload."/".$previous_info->category_image);
        }
        $deleted_message = 'Category '.$previous_info->category_name.' '. 'deleted successfully !!!';
        \App\Category::where('id',$request->delete_category_id)->delete();
        $categories_list = \App\Category::all();
        return redirect('admin/category_list')->with('deleted_message',$deleted_message)->with('categories_list',$categories_list);
	}
	
	public function editCategoryForm($category_id){
		$category_info = \App\Category::where('id',$category_id)->first();
		$categories_list = \App\Category::all()->except($category_id);
        return view('Admin/Products/edit_category_form')->with('category_info', $category_info)->with('category_id',$category_id)
		->with('categories_list',$categories_list);
	}
	
	public function updateCategory(Request $request){
		$updated_info = [
            'category_name'     => $request->category_name,
            'category_slug'     => $request->category_slug,
            'parent_id'     	=> $request->parent_id,
        ];
        
        $image = $request->file('category_image');
        if($image!=null){
            $previous_info = \App\Category::find($request->category_id);
            $upload = 'images/Categories';
            File::Delete($upload."/".$previous_info->category_image);
            $imageName = $request->category_slug.'_'.rand().'.'. $image->getClientOriginalExtension();
            $image->move($upload,$imageName);
            $updated_info['category_image'] =  $imageName;
        }
        
        \App\Category::where('id', $request->category_id)->update($updated_info);
        $categories_list = \App\Category::all();
        $update_message = 'Category Updated Successfully!!';
        return redirect('admin/category_list')->with('update_message',$update_message)->with('categories_list',$categories_list);
	}
	
	public function tags(){
		$tags_list = \App\Tag::all();
        return view('Admin/Products/tags')->with('tags_list',$tags_list);
	}
	
	public function createTag(Request $request){
		\App\Tag::create([
            'tag_name'     		=> $request->tag_name,
            'tag_slug'    		=> $request->tag_slug,
        ]);
        
        $message = 'Tag created Successfully !!!';
        return redirect('admin/tags')->with('message',$message);
	}
	
	public function deleteTag(Request $request){
		$previous_info = \App\Tag::find($request->delete_tag_id);
        \App\Tag::where('id',$request->delete_tag_id)->delete();
		$deleted_message = 'Tag '.$previous_info->tag_name.' '. 'deleted successfully !!!';
        $tags_list = \App\Tag::all();
        return redirect('admin/tags')->with('deleted_message',$deleted_message)->with('tags_list',$tags_list);
	}

	public function editTagForm($tag_id){
		$tag_info = \App\Tag::where('id',$tag_id)->first();
        return view('Admin/Products/edit_tag_form')->with('tag_info', $tag_info);
	}
	
	public function updateTag(Request $request){
		$updated_info = [
            'tag_name'     => $request->tag_name,
            'tag_slug'     => $request->tag_slug,
        ];
        
        \App\Tag::where('id', $request->tag_id)->update($updated_info);
        $tags_list = \App\Tag::all();
        $update_message = 'Tag Updated Successfully!!';
        return redirect('admin/tags')->with('update_message',$update_message)->with('tags_list',$tags_list);
	}
	
	public function programList()
    {
    	$programs_list = \App\Program::all();
        return view('Admin/Programs/program_list')->with('programs_list',$programs_list);
    }

	public function addNewProgramForm()
    {
        return view('Admin/Programs/add_new_program')->with('programs_list',$programs_list);
    }
	
}
