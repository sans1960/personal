   <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ $site->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-center">
                    <div class="max-w-lg rounded overflow-hidden shadow-lg">
                     
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">
                                <img class="w-full" src="{{Storage::url($site->image)}}" alt="{{$site->caption}}">
                            </div>
                            <p class="">
                           {{ Carbon\Carbon::parse($site->created_at)->format('d/m/Y') }}
                            </p>
                    
                        </div>
                        <div class="px-6 pt-4 pb-2">
                          {!! $site->body !!}
                        </div>
                          <div id="map" class=""  style="width: 600px; height: 400px;">
                       
                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('js')
            <script>
      const map = L.map("map").setView([{{$site->latitud}}, {{$site->longitud}}], {{$site->zoom}});

      const tiles = L.tileLayer(
        "https://tile.openstreetmap.org/{z}/{x}/{y}.png",
        {
          maxZoom: 19,
          attribution:
            '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
        }
      ).addTo(map);
    </script>
    @endsection

</x-app-layout>