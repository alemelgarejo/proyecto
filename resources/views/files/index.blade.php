<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('dashboard') }}" style="color: rgb(111, 111, 111);">Inmodata</a> /
            <a href="{{ route('propiedades.index') }}"  style="color: rgb(111, 111, 111);">Propiedades</a> /
            <a href="{{ route('propiedades.show', $propiedade->id) }}"  style="color: rgb(111, 111, 111);">{{ $propiedade->direccion }} /</a>
            <a href="{{ route('files.index2', $propiedade->id) }}"  style="color: rgb(111, 111, 111);">Imágenes</a>
        </h2>
    </x-slot>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <br>
    <a class="" style="color: black; float: left; margin-left: 20%;" href="{{ route('files.create2', $propiedade->id) }}"><img src="{{asset('images/photo.png')}}" alt="editlogo"  style="float: left; margin: 0px 0px 0px 10px; width:40%;" ></a>

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
          <div class="flex flex-col text-center w-full mb-20">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">{{$propiedade->direccion}}</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Gestiona las imágenes de la propiedad aquí.</p>
          </div>
          <div class="flex flex-wrap -m-4">
            @foreach ($files as $file)
                <div class="lg:w-1/3 sm:w-1/2 p-4">
                    <div class="flex relative">
                    <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center" src="{{$file->url}}">
                    <div class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
                        <h2 class="tracking-widest text-sm title-font font-medium text-indigo-500 mb-1">Propiedad: {{$file->propiedad_id}}</h2>
                        <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Shooting Stars</h1>
                        <p class="leading-relaxed">Photo booth fam kinfolk cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.</p>
                        <main x-data="{ 'isDialogOpen': false }" @keydown.escape="isDialogOpen = false" style="float: left; color: black;">
                            <section >
                                <button type="button" @click="isDialogOpen = true"><img src="{{asset('images/recycle-bin.png')}}" alt="deletelogo" style="float: left; margin: 0px 0px 0px 10px; color: black;" > Eliminar</button>
                                <!-- overlay -->
                                <div class="overflow-full" style="background-color: rgba(0,0,0,0.5)" x-show="isDialogOpen" :class="{ 'absolute inset-0 z-10 flex items-start justify-center': isDialogOpen }">
                                    <!-- dialog -->
                                    <div class="bg-white shadow-2xl" x-show="isDialogOpen" @click.away="isDialogOpen = false">
                                        <div class="flex justify-between items-center border-b p-2 text-xl">
                                            <h6 class="text-xl font-bold">Propiedad: {{$propiedade->direccion}}</h6>
                                            <button type="button" @click="isDialogOpen = false">✖</button>
                                        </div>
                                        <div class="p-2">
                                            <!-- content -->
                                            <h4 class="font-bold">¿Desea eliminar ésta imágen?</h4>
                                            <aside class="max-w-lg mt-4 p-4 bg-yellow-100 border border-yellow-500"> <img src="{{$file->url}}" alt="propim">
                                            <ul class="bg-gray-100 border m-4 px-4">
                                                <div class="modal-footer">
                                                    <form class="mr-3" id="formDelete" action="{{ route('files.destroy', $file->id) }}" data-action="{{ route('files.destroy', $file->id) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit">Eliminar <img src="{{asset('images/recycle-bin.png')}}" alt="deletelogo"  style="float: left; margin: 0px 0px 15px 5px;" ></button>
                                                    </form>
                                                </div>
                                            </ul>
                                        </div>
                                    </div><!-- /dialog -->
                                </div><!-- /overlay -->
                            </section>
                        </main>
                    </div>
                    </div>
                </div>
            @endforeach
          </div>
        </div>
      </section>
</x-app-layout>
