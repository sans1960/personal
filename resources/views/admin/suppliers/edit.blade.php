  <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit supplier') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('suppliers.update',$supplier) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$supplier->name}}" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
               
                        <div class="mt-3 grid grid-cols-1 md:grid-cols-2 gap-2">
                            <div>
                                    <x-input-label for="logo" :value="__('Logo')" />
                            <x-text-input id="logo" class="block mt-1 w-full" type="file" name="logo" value="{{$supplier->logo}}"  />
                            <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                            </div>
                            <div>
                                <img id="preview-image-before-upload" class="w-64"
                  src="{{Storage::url($supplier->logo)}}" alt="">
                            </div>

                        </div>
                              <div class="mt-3">
                            <x-input-label for="url" :value="__('Url')" />
                            <x-text-input id="url" class="block mt-1 w-full" type="text" name="url" value="{{$supplier->url}}" required  />
                            <x-input-error :messages="$errors->get('url')" class="mt-2" />
                        </div>
                         <div class="mt-3">
              <label for="notes" class="form-label">Notes</label>
              <textarea class="" id="notes" rows="3" name="notes">
                {!! $supplier->notes!!}
              </textarea>
            </div>
                        <div class="flex items-center justify-end mt-4">


                            <x-primary-button class="ms-4">
                                {{ __('Uptate Supplier') }}
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
       $('#logo').change(function(){
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