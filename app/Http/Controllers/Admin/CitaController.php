<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCitaRequest;
use App\Http\Requests\UpdateCitaRequest;
use App\Models\Cita;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;


class CitaController extends Controller
{
 
    public function index()
    {
         $cites = Cita::paginate(10);
      
      
        return view('admin.cites.index',compact('cites'));
    }


    public function create()
    {
        return view('admin.cites.create');
    }

   
    public function store(StoreCitaRequest $request)
    {
         $validated = $request->validated();
            Cita::create($validated);
            
        
            Alert::success('Cita creada','Cita afegida amb exit');
            return redirect()->route('cites.index');
    }

   
    public function show($id)
    {
        $cita = Cita::findOrFail($id);
        return view('admin.cites.show',compact('cita'));
    }

  
    public function edit($id)
    {
           $cita = Cita::findOrFail($id);
        return view('admin.cites.edit',compact('cita'));
    }

    public function destroy($id)
    {
        $cita = Cita::findOrFail($id);
        $cita->delete();
        Alert::success('Cita eliminada','Cita eliminada amb exit');
            return redirect()->route('cites.index');
    }






       public function update(UpdateCitaRequest $request, $id)
    {
          $validated = $request->validated();
          $cita = Cita::find($id);
           $update = $cita->update($validated);
            if($update){
            Alert::success('Cita updated','Cita actualitzada amb exit');
            return redirect()->route('cites.index');
            }
    }
}
