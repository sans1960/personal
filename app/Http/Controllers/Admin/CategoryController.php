<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           $request->validate([
            'name' => 'required|max:200',
            'image' => File::types(['jpg', 'png', 'webp', 'jpeg'])

                ->max(1024),
          
       

        ]);
        if ($request->hasFile('image')) {
            // put image in the public storage
            $filePath = Storage::disk('public')->put('images/categories', request()->file('image'));
        }
        $category = new Category();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->image = $filePath;
      
        $category->save();
          Alert::success('Categoria creada','Categoria afegida amb exit');
            return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
          $request->validate([
            'name' => 'required|max:200',
            'image' => File::types(['jpg', 'png', 'webp', 'jpeg'])

                ->max(1024),
          
       

        ]);
             if ($request->hasFile('image')) {
            // delete image
            Storage::disk('public')->delete($category->image);

            $filePath = Storage::disk('public')->put('images/categories', request()->file('image'), 'public');
            $category->image = $filePath;
          
        }
          $category->name = $request->name;
        $category->slug = Str::slug($request->name);
          $category->update();
          Alert::success('Categoria actualitzada','Categoria actualitzada amb exit');
            return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
           Storage::disk('public')->delete($category->image);
        $category->delete();
         Alert::success('Categoria eliminada','Categoria eliminada amb exit');
            return redirect()->route('categories.index');
    }
}
