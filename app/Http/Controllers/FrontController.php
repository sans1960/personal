<?php

namespace App\Http\Controllers;

use App\Models\ImageSpace;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class FrontController extends Controller
{
    public function index()
    {
        return view('welcome');

    }

    public function home()
    {
        return view('front.home');
    }
    public function spaceImages()
    {
      $images = ImageSpace::paginate(12);
        return view('front.space',compact('images'));
       
     
    }
    public function oneImage( $id):Response
    {
     $image = ImageSpace::find($id);
     return response()->view('front.one',compact('image'));
       
     
    }

 
}
