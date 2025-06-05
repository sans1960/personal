@extends('layouts.front')
@section('content')
  <div class="flex flex-col justify-center items-center min-h-screen" style="background-image:linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(https://cdn.pixabay.com/photo/2015/06/24/13/45/forest-820049_1280.jpg);background-size:cover;">
    <h1 class="text-6xl uppercase text-center text- text-white">My personal web</h1>
       <a href="{{ route('home')}}" class="inline-flex items-center mt-5 px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">enter
                        </a>
    </div>
@endsection
