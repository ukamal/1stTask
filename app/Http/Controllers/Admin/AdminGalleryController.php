<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class AdminGalleryController extends Controller
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
    public function uploadImageForm()
    {
    	return view('Admin/Gallery/upload_image_gallery_form');
    }
	
	public function uploadGalleryImage(Request $request){
        $image = $request->file('image');
        $upload = 'images/Gallery';
        if($image==null){
            $imageName = '';
        }
        else{
            $imageName = $request->slug.'_'.rand().'.'. $image->getClientOriginalExtension();
            $image->move($upload,$imageName);
        }
        
       \App\Gallery::create([
            'image'    		=> $imageName,
            'title'     	=> $request->title,
            'slug'     		=> $request->slug,
        ]);
        
        $message = 'Gallery Image created Successfully !!!';
        return redirect('admin/upload_image_form')->with('message',$message);
	}
	
	public function uploadVideoForm()
    {
    	return view('Admin/Gallery/upload_video_gallery_form');
    }
	
	
	public function uploadGalleryVideo(Request $request){
        
       \App\Gallery::create([
            'video_link'   	=> $request->video_link,
            'title'     	=> $request->title,
            'slug'     		=> $request->slug,
        ]);
        
        $message = 'Gallery Video created Successfully !!!';
        return redirect('admin/upload_video_form')->with('message',$message);
	}
	
	public function viewGalleryList(){
		$gallery_list = \App\Gallery::all();
		//dd($gallery_list);
		return view('Admin/Gallery/gallery_list')->with('gallery_list',$gallery_list);
	}
	
	public function updateGalleryImage(Request $request){
		
		$update_info = [
			"title" => $request->update_title,
			"slug" => $request->update_slug,
		];
		\App\Gallery::where('id', $request->update_image_id)->update($update_info);
		
		$image = $request->file('update_gallery_image_input');
        if($image!=null){
            $previous_info = \App\Gallery::find($request->update_image_id);
            $upload = 'images/Gallery';
            File::Delete($upload."/".$previous_info->image);
            $imageName = $image->getClientOriginalName();
            $image->move($upload,$imageName);
            $updated_image_info['image'] =  $imageName;
			\App\Gallery::where('id', $request->update_image_id)->update($updated_image_info);
			$update_message = 'Gallery updated successfully !!!';
			return redirect('admin/view_gallery_list')->with('update_message',$update_message);
        }
		else{
			return redirect('admin/view_gallery_list');
		}		
	}
	
	public function updateGalleryVideo(Request $request){
		
		$update_info = [
			"title" 		=> $request->update_video_title,
			"slug" 			=> $request->update_video_slug,
			"video_link" 	=> $request->update_video_link,
		];
		
		\App\Gallery::where('id', $request->update_video_id)->update($update_info);
		
		$update_message = 'Gallery updated successfully !!!';
		
		return redirect('admin/view_gallery_list')->with('update_message',$update_message);
	}
	
	public function deleteGalleryImage(Request $request){
		$previous_info = \App\Gallery::find($request->delete_image_id);
        if($previous_info->image!=null){
            $upload = 'images/Gallery';
            File::Delete($upload."/".$previous_info->image);
        }
        $deleted_message = 'Gallery image deleted successfully !!!';
        \App\Gallery::where('id',$request->delete_image_id)->delete();
        return redirect('admin/view_gallery_list')->with('deleted_message',$deleted_message);
	}
	
	public function deleteGalleryVideo(Request $request){
        \App\Gallery::where('id',$request->delete_video_id)->delete();
		$deleted_message = 'Gallery video deleted successfully !!!';
        return redirect('admin/view_gallery_list')->with('deleted_message',$deleted_message);
	}
	
}
