<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $task->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-center">
                    <div class="max-w-sm rounded overflow-hidden shadow-lg">
                     
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">{{ $task->title }}</div>
                            <p class="">
                           {{ $task->description }}
                            </p>
                        </div>
                        <div class="px-6 pt-4 pb-2">
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ Carbon\Carbon::parse($task->created_at)->format('d/m/Y') }}</span>
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">@if ($task->completed == 0)
                                Pendent
                            @else
                            Completed

                            @endif</span>
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">@if ($task->completed == 1)
                                {{ Carbon\Carbon::parse($task->updated_at)->format('d/m/Y') }}
                            @else
                            ----
                            
                            @endif</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>