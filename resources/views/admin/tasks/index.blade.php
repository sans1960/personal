<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
               

                    <div class="flex justify-end">
                        <a href="{{ route('tasks.create') }}" class="inline-flex items-center px-2 py-1 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>

                </div>
                <table class="table-auto min-w-full rounded-xl">
                    <thead>
                        <tr class="bg-gray-50">

                            <th scope="col" class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"> Title </th>
                            <th scope="col" class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"> Data </th>
                            <th scope="col" class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize "> Completed</th>
                            <th scope="col" colspan="3" class="p-5 text-center whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"> Actions </th>

                        </tr>
                    </thead>
                    @foreach ($tasks as $task )
                    <tr class="bg-white transition-all duration-500 hover:bg-gray-50">

                        <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 "> 
                        @if ($task->completed==1)
                        <p class="line-through">{{ $task->title }}</p>
                        @else
                        <p> {{ $task->title }}</p>
                        @endif
                       

                        </td>
                        <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> {{ Carbon\Carbon::parse($task->created_at)->format('d/m/Y') }}</td>

                        <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> @if ($task->completed == 0)
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-red-800">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                            @else
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-green-800">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>

                            @endif
                        </td>
                        <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                            <a href="{{ route('tasks.show',$task) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-green-800">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>

                            </a>
                        </td>
                        <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                            <a href="{{ route('tasks.edit',$task) }}">

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-yellow-800">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                </svg>

                            </a>
                        </td>
                        <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                            <form action="{{ route('tasks.destroy',$task)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" 
                                    class="skow_confirm flex space-x-2 items-center px-2 py-2 bg-rose-500 hover:bg-rose-800 rounded-md drop-shadow-md cursor-pointer duration-300">
                                    <svg class="fill-white" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M 10 2 L 9 3 L 3 3 L 3 5 L 21 5 L 21 3 L 15 3 L 14 2 L 10 2 z M 4.3652344 7 L 5.8925781 20.263672 C 6.0245781 21.253672 6.877 22 7.875 22 L 16.123047 22 C 17.121047 22 17.974422 21.254859 18.107422 20.255859 L 19.634766 7 L 4.3652344 7 z">
                                        </path>
                                    </svg>
                                    
                                </button>
                            </form>
                        </td>

                    </tr>
                    @endforeach


                    </tbody>
                </table>
               
            </div>
            <div class="mt-3 p-3">
               {{ $tasks->links() }}
            </div>
           
        </div>
         
    </div>
    @section('js')
  
    @endsection
</x-app-layout>