<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImageSpace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;

class ImageSpaceController extends Controller
{
    public function index(){
        $images = ImageSpace::paginate(10);
        return view('admin.imagesspace.index',compact('images'));
    }
      public function createImage(){
        $apikey = config('nasa.key');
        $response = Http::get('https://api.nasa.gov/planetary/apod?api_key='.$apikey);
        $data = $response->json();
        $image = new ImageSpace();
        $image->title = $data['title'];
        $image->explanation = $data['explanation'];
        $image->date = $data['date'];
        $image->image = $data['hdurl'];
        $image->save();
        Alert::success('Imatge creada','Imatge guardada amb exit');
        return back();

      
    }
}
