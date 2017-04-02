<?php

namespace App\Http\Controllers;

use Google\Cloud\Vision\VisionClient;
use Illuminate\Http\Request;

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

		echo "Text:\n";
		foreach ((array) $result->text() as $text) {
		    print($text->description() . PHP_EOL);
		}
		return ;
	}
}
    