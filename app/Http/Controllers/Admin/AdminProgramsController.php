<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class AdminProgramsController extends Controller
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
    public function programList()
    {
    	$programs_list = \App\Program::all();
        return view('Admin/Programs/program_list')->with('programs_list',$programs_list);
    }

	public function addNewProgram()
    {
        return view('Admin/Programs/add_new_program');
    }
	
	public function createProgram(Request $request){
        $image = $request->file('program_image');
        $upload = 'images/Programs';
        if($image==null){
            $imageName = '';
        }
        else{
            $imageName = $request->program_slug.'_'.rand().'.'. $image->getClientOriginalExtension();
            $image->move($upload,$imageName);
        }
        
       \App\Program::create([
            'program_image'    => $imageName,
            'program_name'     => $request->program_name,
            'program_slug'     => $request->program_slug,
        ]);
        
        $message = 'Program created Successfully !!!';
        return redirect('admin/add_new_program')->with('message',$message);
	}
	
	public function deleteProgram(Request $request){
		$previous_info = \App\Program::find($request->delete_program_id);
        if($previous_info->program_image!=null){
            $upload = 'images/Programs';
            File::Delete($upload."/".$previous_info->program_image);
        }
        $deleted_message = 'Program '.$previous_info->program_name.' '. 'deleted successfully !!!';
        \App\Program::where('id',$request->delete_program_id)->delete();
        $programs_list = \App\Program::all();
        return redirect('admin/program_list')->with('deleted_message',$deleted_message)->with('programs_list',$programs_list);
	}
	
	public function editProgramForm($program_id){
		$program_info = \App\Program::where('id',$program_id)->first();
        return view('Admin/Programs/edit_program_form')->with('program_info', $program_info)->with('program_id',$program_id);
	}
	
	public function updateProgram(Request $request){
		$updated_info = [
            'program_name'     => $request->program_name,
            'program_slug'     => $request->program_slug,
        ];
        
        $image = $request->file('program_image');
        if($image!=null){
            $previous_info = \App\Program::find($request->program_id);
            $upload = 'images/Programs';
            File::Delete($upload."/".$previous_info->program_image);
            $imageName = $request->program_slug.'_'.rand().'.'. $image->getClientOriginalExtension();
            $image->move($upload,$imageName);
            $updated_info['program_image'] =  $imageName;
        }
        
        \App\Program::where('id', $request->program_id)->update($updated_info);
        $programs_list = \App\Program::all();
        $update_message = 'Program Updated Successfully!!';
        return redirect('admin/program_list')->with('update_message',$update_message)->with('programs_list',$programs_list);
	}
	
}
