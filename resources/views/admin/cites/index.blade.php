<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cites') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
               

                    <div class="flex justify-end">
                        <a href="{{ route('cites.create') }}" class="inline-flex items-center px-2 py-1 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path fill-rule="evenodd" d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>

                </div>
                <table class="table-auto min-w-full rounded-xl">
                    <thead>
                        <tr class="bg-gray-50">

                            <th scope="col" class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 uppercase"> Nom </th>
                            <th scope="col" class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 uppercase""> Dia </th>
                            <th scope="col" class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 uppercase" "> Hora</th>
                              <th scope="col" class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 uppercase" "> Lloc</th>
                            <th scope="col" colspan="3" class="p-5 text-center whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 uppercase""> Actions </th>

                        </tr>
                    </thead>
                 


                    </tbody>
                </table>
               
            </div>
            <div class="mt-3 p-3">
               {{ $cites->links() }}
            </div>
           
        </div>
         
    </div>
    @section('js')
  
    @endsection
</x-app-layout>