<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class AdminBannerSlidersController extends Controller
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
	
	public function bannerSlidersList()
    {
    	$banner_sliders_list = \App\BannerSliders::all();
        return view('Admin/Banner Sliders/banner_sliders_list')->with('banner_sliders_list',$banner_sliders_list);
    }
	
	public function addNewBannerSliderForm()
    {
        return view('Admin/Banner Sliders/add_new_banner_slider');
    }
	
	public function createBannerSlider(Request $request){
        $image = $request->file('banner_slider_image');
        $upload = 'images/Banner Sliders';
        if($image==null){
            $imageName = '';
        }
        else{
            $imageName = $request->banner_slider_name.'_'.rand().'.'. $image->getClientOriginalExtension();
            $image->move($upload,$imageName);
        }
        
       \App\BannerSliders::create([
            'banner_slider_image'    	=> $imageName,
            'banner_slider_name'     	=> $request->banner_slider_name,
        ]);
        
        $message = 'Banner Slider created Successfully !!!';
        return redirect('admin/add_new_banner_slider_form')->with('message',$message);
	}
	
	public function deleteBannerSlider(Request $request){
		$previous_info = \App\BannerSliders::find($request->delete_banner_slider_id);
        if($previous_info->banner_slider_image!=null){
            $upload = 'images/Banner Sliders';
            File::Delete($upload."/".$previous_info->banner_slider_image);
        }
        $deleted_message = 'Banner Slider '.$previous_info->banner_slider_name.' '. 'deleted successfully !!!';
        \App\BannerSliders::where('id',$request->delete_banner_slider_id)->delete();
        $banner_sliders_list = \App\BannerSliders::all();
        return redirect('admin/banner_sliders_list')->with('deleted_message',$deleted_message)->with('banner_sliders_list',$banner_sliders_list);
	}
	
	public function editBannerSliderForm($banner_slider_id){
		$banner_slider_info = \App\BannerSliders::where('id',$banner_slider_id)->first();
		$banner_sliders_list = \App\BannerSliders::all()->except($banner_slider_id);
        return view('Admin/Banner Sliders/edit_banner_slider_form')->with('banner_slider_info', $banner_slider_info)->with('banner_slider_id',$banner_slider_id)
		->with('banner_sliders_list',$banner_sliders_list);
	}
	
	public function updateBannerSlider(Request $request){
		$updated_info = [
            'banner_slider_name'   => $request->banner_slider_name,
        ];
        
        $image = $request->file('banner_slider_image');
        if($image!=null){
            $previous_info = \App\BannerSliders::find($request->banner_slider_id);
            $upload = 'images/Banner Sliders';
            File::Delete($upload."/".$previous_info->banner_slider_image);
            $imageName = $request->banner_slider_name.'_'.rand().'.'. $image->getClientOriginalExtension();
            $image->move($upload,$imageName);
            $updated_info['banner_slider_image'] =  $imageName;
        }
        
        \App\BannerSliders::where('id', $request->banner_slider_id)->update($updated_info);
        $banner_sliders_list = \App\BannerSliders::all();
        $update_message = 'Banner Slider Updated Successfully!!';
        return redirect('admin/banner_sliders_list')->with('update_message',$update_message)->with('banner_sliders_list',$banner_sliders_list);
	}
}
