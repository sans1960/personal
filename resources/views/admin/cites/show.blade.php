 <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ $cita->nom }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-center">
                    <div class="max-w-sm rounded overflow-hidden shadow-lg">
                     
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">{{ $cita->lloc }}</div>
                            <p class="">
                           {{ Carbon\Carbon::parse($cita->dia)->format('d/m/Y') }}
                            </p>
                            <p>{{ $cita->hora }}</p>
                             <p>{{ $cita->motiu }}</p>
                        </div>
                        <div class="px-6 pt-4 pb-2">
                          {{ $cita->comentari }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>