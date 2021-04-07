<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}" style="color: rgb(111, 111, 111);">Inmodata</a> /
            <a href="{{ route('propiedades.index') }}"  style="color: rgb(111, 111, 111);">Propiedades</a> /
            <a href="{{ route('propiedades.show', $propiedade->id) }}"  style="color: rgb(111, 111, 111);">{{ $propiedade->direccion }} /</a>
            <a href="{{ route('files.create2', $propiedade->id) }}"  style="color: rgb(111, 111, 111);">Subir imágenes</a>
        </h2>
    </x-slot>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <br>
    <a class="" style="color: black; float: left; margin-left: 20%;" href="{{ route('files.index2', $propiedade->id) }}"><img src="{{asset('images/image.png')}}" alt="editlogo"  style="float: left; margin: 0px 0px 0px 10px;" ></a>

    <div class="object-center">
          <div class="mt-5 md:mt-0 md:col-span-2" style="width: 60%; margin-left: 20%;">

              <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                  {{-- <div class="grid grid-cols-3 gap-6">
                    <div class="col-span-3 sm:col-span-2">
                      <label for="company_website" class="block text-sm font-medium text-gray-700">
                        URL
                      </label>
                      <div class="mt-1 flex rounded-md shadow-sm">
                        <input type="text" name="url" id="url" class=" focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" placeholder="mi_imagen">
                      </div>
                    </div>
                  </div> --}}
                  <div>
                    <label class="block text-lg font-medium text-gray-700">
                            Propiedad: {{$propiedade->direccion}}
                      </label>
                      <br>
                    <label class="block text-sm font-medium text-gray-700">
                      Subir imágen
                    </label>
                    <form action="{{route('files.store2', $propiedade->id)}}" method="POST" enctype="multipart/form-data" class="dropzone border-2 border-gray-300 border-dashed rounded-md" id="my-awesome-dropzone">
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 ">
                            @csrf
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <p class="text-xs text-gray-500">
                                    PNG, JPG únicamente permitidos.
                                </p>
                            </div>
                        </div>
                    </form>
                        @error('file')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                  </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                  {{-- <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    Guardar
                  </button> --}}
                </div>
              </div>
        </div>
      </div>
      <script>
          Dropzone.options.myAwesomeDropzone = {
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            },
            dictDefaultMessage: 'Arrastre sus imágenes para subirlas',
            acceptedFiles: 'image/*',
            maxFiles: 4,
            paramName: 'file'
            /* maxFilesize: '', */
        };
      </script>
</x-app-layout>
