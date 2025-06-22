@extends('layouts.front')
@section('content')
@include('layouts.navfront')

  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-12">
    
               <div class=" mt-3 rounded overflow-hidden shadow-lg p-14 mb-5">
                         <h3 class="text-center text-3xl ">{{$image->title}}</h3>
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">
                                <img class="w-full mx-auto" src="{{$image->image}}" alt="Sunset in the mountains">
                            </div>
                            <p class="">
                           {{ Carbon\Carbon::parse($image->date)->format('d/m/Y') }}
                            </p>
                    
                        </div>
                        <div class="flex justify-center p-5">
                           {{$image->explanation}}
                        </div>
                    </div>
   
          
           
        </div>


@endsection