<?php

namespace App\Http\Controllers;

use Google\Cloud\Vision\VisionClient;
use Illuminate\Http\Request;
use DB;

class GcloudController extends Controller
{
	public function index()
	{
		$vision = new VisionClient([
		    'projectId' => "digiwizards-163315"
		]);
		$path = storage_path().'/images/image.jpg';
		
		$image = $vision->image(file_get_contents($path), ['TEXT_DETECTION']);

		# Performs label detection on the image file
		$result = $vision->annotate($image);

		// var_dump($result);

		echo "Vehicle No:\n";
		$no =  $result->text()[0]->description();
		$no = trim( str_replace(' ', '', $no ));
		echo $no;

		// var_dump($no);
		$vehicle = DB::table('rto')->where('vehicle_no',$no)->first();
		if(!empty($vehicle))
		{
		// var_dump($vehicle);
		echo "<br>Type: ".$vehicle->type;
		echo "<br>Classification: ".$vehicle->classification;
		echo "<br>Name: ".$vehicle->name;
		echo "<br>Address: ".$vehicle->address;
		echo "<br>Mobile: ".$vehicle->mobile;
		echo "<br>RC: ".$vehicle->RC;
		}
		// var_dump(json_decode(json_encode((( (array) $result->text() )[0]))),true);
		// foreach ((array) $result->text() as $text) {
		    // print($text->description() . PHP_EOL);
		// }
		return ;
	}
}
    