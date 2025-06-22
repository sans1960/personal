@extends('layouts.front')
@section('content')
@include('layouts.navfront')
<h1 class="text-center text-4xl mt-5 mb-5">IMATGES DEL ESPAI</h1>
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3">
        @foreach ($images as $image)
               <div class=" mt-3 rounded overflow-hidden shadow-lg">
                         <h3 class="text-center text-xl">{{$image->title}}</h3>
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">
                                <img class="w-full" src="{{$image->image}}" alt="Sunset in the mountains">
                            </div>
                            <p class="">
                           {{ Carbon\Carbon::parse($image->date)->format('d/m/Y') }}
                            </p>
                    
                        </div>
                        <div class="flex justify-center">
                          <a href="{{route('oneimage',$image)}}" class="mb-3">
                               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-green-800">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                          </a>
                        </div>
                    </div>
        @endforeach
          
           
        </div>


@endsection