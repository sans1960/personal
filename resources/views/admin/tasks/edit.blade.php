 <x-app-layout>
     <x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
             {{ __('Edit task') }}
         </h2>
     </x-slot>

     <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
             <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                 <div class="p-6 text-gray-900 dark:text-gray-100">
                     <form action="{{ route('tasks.update',$task) }}" method="post">
                        @method('PUT')
                         @csrf
                         <div>
                             <x-input-label for="title" :value="__('Title')" />
                             <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ $task->title }}" required autofocus />
                             <x-input-error :messages="$errors->get('title')" class="mt-2" />
                         </div>
                         <div class="mt-3">
                             <x-input-label for="description" :value="__('Description')" />
                             <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" value="{{ $task->description }}" required />
                             <x-input-error :messages="$errors->get('title')" class="mt-2" />
                         </div>
                         <div class="mt-3 flex justify-around">
                             <div class="flex items-center mr-4 mb-4">
                                 <input id="" type="radio" name="completed" class="mr-4" value="1"  {{ $task->completed == 1 ? 'checked' : '' }} />
                                 <label for="radio1" class="flex items-center cursor-pointer">
                                 
                                     Completed</label>
                             </div>
                             <div class="flex items-center mr-4 mb-4">
                                 <input id="" type="radio" name="completed" class="mr-4" value="0" {{ $task->completed == 0 ? 'checked' : '' }} />
                                 <label for="radio1" class="flex items-center cursor-pointer">
                                
                                     Pendent</label>
                             </div>
                         </div>
                         <div class="flex items-center justify-end mt-4">


                             <x-primary-button class="ms-4">
                                 {{ __('Update Task') }}
                             </x-primary-button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </x-app-layout>