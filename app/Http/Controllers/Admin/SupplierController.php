<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;
use RealRashid\SweetAlert\Facades\Alert;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::paginate(10);
        return view('admin.suppliers.index',compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           $request->validate([
            'name' => 'required|max:200',
            'logo' => File::types(['jpg', 'png', 'webp', 'jpeg'])

                ->max(1024),
            'url'=>'required',
            'notes' => 'required',
        ]);
             if ($request->hasFile('logo')) {
            // put image in the public storage
            $filePath = Storage::disk('public')->put('images/suppliers', request()->file('logo'));
        }
        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->slug = Str::slug($request->name);
        $supplier->logo = $filePath;
        $supplier->notes = $request->notes;
        $supplier->url = $request->url;
        $supplier->save();
          Alert::success('Supplier creat','Supplier afegit amb exit');
            return redirect()->route('suppliers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        return view('admin.suppliers.show',compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        return view('admin.suppliers.edit',compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
          $request->validate([
            'name' => 'required|max:200',
            'image' => File::types(['jpg', 'png', 'webp', 'jpeg'])

                ->max(1024),
            'notes'=>'required',
            'url' => 'required',
       

        ]);
        if ($request->hasFile('logo')) {
            // delete image
            Storage::disk('public')->delete($supplier->logo);

            $filePath = Storage::disk('public')->put('images/suppliers', request()->file('logo'), 'public');
            $supplier->logo = $filePath;
          
        }
            $supplier->name = $request->name;
        $supplier->slug = Str::slug($request->name);
       
        $supplier->notes = $request->notes;
        $supplier->url = $request->url;
        $supplier->update();
          Alert::success('Supplier actualitzat','Supplier actualitzat amb exit');
            return redirect()->route('suppliers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
         Storage::disk('public')->delete($supplier->logo);
        $supplier->delete();
         Alert::success('Supplier eliminat','Supplier eliminat amb exit');
            return redirect()->route('suppliers.index');
    }
}
