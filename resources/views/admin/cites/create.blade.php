 <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Cita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('cites.store') }}" method="post">
                        @csrf
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                            <x-input-label for="nom" :value="__('Nom')" />
                            <x-text-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autofocus />
                            <x-input-error :messages="$errors->get('nom')" class="mt-2" />
                        </div>
                        <div class="">
                            <x-input-label for="lloc" :value="__('Lloc')" />
                            <x-text-input id="lloc" class="block mt-1 w-full" type="text" name="lloc" :value="old('lloc')" required />
                            <x-input-error :messages="$errors->get('lloc')" class="mt-2" />
                        </div>
                        </div>
                        <div class="mt-3 grid grid-cols-2 gap-2">
                              <div>
                            <x-input-label for="dia" :value="__('Dia')" />
                            <x-text-input id="dia" class="block mt-1 w-full" type="date" name="dia" :value="old('dia')" required  />
                            <x-input-error :messages="$errors->get('dia')" class="mt-2" />
                        </div>
                                <div>
                            <x-input-label for="hora" :value="__('Hora')" />
                            <x-text-input id="hora" class="block mt-1 w-full" type="time" name="hora" :value="old('dia')" required  />
                            <x-input-error :messages="$errors->get('hora')" class="mt-2" />
                        </div>
                        </div>
                          <div class="grid grid-cols-2 gap-2 mt-3">
                            <div>
                            <x-input-label for="motiu" :value="__('Motiu')" />
                            <x-text-input id="motiu" class="block mt-1 w-full" type="text" name="motiu" :value="old('motiu')" required  />
                            <x-input-error :messages="$errors->get('motiu')" class="mt-2" />
                        </div>
                        <div class="">
                            <x-input-label for="comentari" :value="__('Comentari')" />
                            <x-text-input id="comentari" class="block mt-1 w-full" type="text" name="comentari" :value="old('comentari')"  />
                            <x-input-error :messages="$errors->get('comentari')" class="mt-2" />
                        </div>
                        </div>
                        <div class="flex items-center justify-end mt-4">


                            <x-primary-button class="ms-4">
                                {{ __('Add Cita') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>