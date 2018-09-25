<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Course;
use DB;

class CourseController extends Controller
{
    public function course()
    {
    	$jsonurl = "https://api.coursera.org/api/courses.v1";
       
       $data = json_decode(file_get_contents($jsonurl), true);

       $exist = Course::all()->pluck('course_id')->toArray();

       return view('cource',compact('exist'))->withData($data);
    }
    public function save_course(Request $request,$id)
    {
    	$jsonurl = "https://api.coursera.org/api/courses.v1";
       
       $data = json_decode(file_get_contents($jsonurl), true);
       //dd($data['elements'][$id]);
       $exist = Course::where('course_id',$data['elements'][$id]['id'])->first();
       if(empty($exist) )
       {	$course = new Course();
	       	$course->course_id = $data['elements'][$id]['id'];
	      	$course->course_type = $data['elements'][$id]['courseType'];
	       	$course->course_name = $data['elements'][$id]['name'];
	       	$course->save();
	       $request->session()->flash('message','Succesfully Saved Record');
    	return back();
       }else{
       	$request->session()->flash('message','Record already Saved');
    	return back();
       }
       
       
    }
    public function saved_course()
    {
    	$exist = Course::all();
    	return view('saved_course',compact('exist'));
    }
}
