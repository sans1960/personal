   <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ $category->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-center">
                    <div class="max-w-md rounded overflow-hidden shadow-lg">
                     
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">
                                <img class="w-full" src="{{Storage::url($category->image)}}" alt="Sunset in the mountains">
                            </div>
                            <p class="">
                           {{ Carbon\Carbon::parse($category->created_at)->format('d/m/Y') }}
                            </p>
                    
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>