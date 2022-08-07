<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function __invoke(Request $request)
    {
        return view('image-upload');
        //return "Welcome to our homepage";
    }
    public function imageUpload()
    {
    	return view('image-upload');
    }

    public function imageUploadPost(Request $request)
    {
    	$this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);


    	return back()
    		->with('success','Image Uploaded successfully.')
    		->with('path',$imageName);
    }

}
