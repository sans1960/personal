<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;
use RealRashid\SweetAlert\Facades\Alert;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sites = Site::paginate(6);
        return view('admin.sites.index',compact('sites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sites.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           $request->validate([
            'name' => 'required|max:200',
            'image' => File::types(['jpg', 'png', 'webp', 'jpeg'])

                ->max(2048),
            'body'=>'required',
            'latitud'=>'required',
            'longitud'=>'required',
             'zoom'=>'required',
              'caption'=>'required',
       

        ]);
              if ($request->hasFile('image')) {
            // put image in the public storage
            $filePath = Storage::disk('public')->put('images/sites', request()->file('image'));
        }
        $site = new Site();
        $site->name = $request->name;
        $site->slug = Str::slug($request->name);
        $site->image = $filePath;
        $site->body = $request->body;
         $site->latitud = $request->latitud;
          $site->longitud = $request->longitud;
           $site->zoom = $request->zoom;
            $site->caption = $request->caption;
        $site->save();
          Alert::success('Lloc creat','Lloc afegit amb exit');
            return redirect()->route('sites.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Site $site)
    {
        return view('admin.sites.show',compact('site'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Site $site)
    {
        return view('admin.sites.edit',compact('site'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Site $site)
    {
             $request->validate([
            'name' => 'required|max:200',
            'image' => File::types(['jpg', 'png', 'webp', 'jpeg'])

                ->max(2048),
            'body'=>'required',
            'latitud'=>'required',
            'longitud'=>'required',
             'zoom'=>'required',
              'caption'=>'required',
       

        ]);
            if ($request->hasFile('image')) {
            // delete image
            Storage::disk('public')->delete($site->image);

            $filePath = Storage::disk('public')->put('images/sites', request()->file('image'), 'public');
            $site->image = $filePath;
          
        }
          
        $site->name = $request->name;
        $site->slug = Str::slug($request->name);
     
        $site->body = $request->body;
         $site->latitud = $request->latitud;
          $site->longitud = $request->longitud;
           $site->zoom = $request->zoom;
            $site->caption = $request->caption;
        $site->update();
          Alert::success('Lloc actualitzat','Lloc actualitzat amb exit');
            return redirect()->route('sites.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Site $site)
    {
          Storage::disk('public')->delete($site->image);
        $site->delete();
         Alert::success('Site eliminat','Site eliminat amb exit');
            return redirect()->route('sites.index');
    }
}
