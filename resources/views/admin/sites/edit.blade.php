  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit site') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('sites.update',$site) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$site->name}}" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="mt-3 mb-3 grid grid-cols-1 md:grid-cols-3 gap-2">
                            <div>
                            <x-input-label for="latitud" :value="__('Latitud')" />
                            <x-text-input id="latitud" class="block mt-1 w-full" type="text" name="latitud" value="{{$site->latitud}}" required  />
                            <x-input-error :messages="$errors->get('latitud')" class="mt-2" />
                        </div>
                           <div>
                            <x-input-label for="longitud" :value="__('Longitud')" />
                            <x-text-input id="longitud" class="block mt-1 w-full" type="text" name="longitud" value="{{$site->longitud}}" required  />
                            <x-input-error :messages="$errors->get('longitud')" class="mt-2" />
                        </div>
                           <div>
                            <x-input-label for="zoom" :value="__('Zoom')" />
                            <x-text-input id="zoom" class="block mt-1 w-full" type="number" name="zoom" value="{{$site->zoom}}" required  />
                            <x-input-error :messages="$errors->get('zoom')" class="mt-2" />
                        </div>
                        </div>
                             <div class="mb-3">
                            <x-input-label for="caption" :value="__('Caption')" />
                            <x-text-input id="caption" class="block mt-1 w-full" type="text" name="caption" value="{{$site->caption}}" required  />
                            <x-input-error :messages="$errors->get('caption')" class="mt-2" />
                        </div>
               
                        <div class="mt-3 grid grid-cols-1 md:grid-cols-2 gap-2">
                            <div>
                                    <x-input-label for="image" :value="__('Image')" />
                            <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" value="{{$site->image}}"  />
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                            </div>
                            <div>
                                <img id="preview-image-before-upload" class="w-64"
                  src="{{Storage::url($site->image)}}" alt="">
                            </div>

                        </div>
                         <div class="mt-3">
              <label for="body" class="form-label">Body</label>
              <textarea class="" id="body" rows="3" name="body">
                {!! $site->body!!}
              </textarea>
            </div>
                        <div class="flex items-center justify-end mt-4">


                            <x-primary-button class="ms-4">
                                {{ __('Update Site') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @section('js')
    <script>
  $(document).ready(function (e) {
       $('#image').change(function(){
        let reader = new FileReader();
        reader.onload = (e) => {
          $('#preview-image-before-upload').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
       });
    });
</script>
<script>
  tinymce.init({
            selector: 'textarea',
            advcode_inline: true,
            plugins: 'anchor autolink charmap codesample code emoticons  link lists  searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link  table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat | code',
            branding: false,
            menubar: false,
            language: 'ca',
            advcode_inline: true,
        });
</script>
    
    @endsection
</x-app-layout>