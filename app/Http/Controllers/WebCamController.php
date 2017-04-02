<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebCamController extends Controller
{
	public function postImages(Request $request)
	{

        $baseFromJavascript = $request->get('base64'); // $_POST['base64']; //your data in base64 'data:image/png....';
// We need to remove the "data:image/png;base64,"
        $base_to_php = explode(',', $baseFromJavascript);
// the 2nd item in the base_to_php array contains the content of the image
        $data = base64_decode($base_to_php[1]);
        //dd($data);
// here you can detect if type is png or jpg if you want
		$filepath = "/uploads/image.png"; // or image.jpg

// Save the image in a defined path
		file_put_contents($filepath,$data);
	}
	public function view(){
		return view('webcam');
	}
}
