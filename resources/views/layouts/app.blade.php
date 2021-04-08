<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
		<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}"><!---->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/bootstrap/main.min.css" integrity="sha512-mK6wVf3xsmNcJnp0ZI+YORb6jQBsAIIwkOfMV47DHIiwvkSgR0t7GNCVBiotLQWWR8AND/LxWHAatnja1fU7kQ==" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/main.min.css" integrity="sha512-IBfPhioJ2AoH2nST7c0jwU0A3RJ7hwIb3t+nYR4EJ5n9P6Nb/wclzcQNbTd4QFX1lgRAtTT+axLyK7VUCDtjWA==" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/daygrid/main.min.css" integrity="sha512-CN6oL2X5VC0thwTbojxZ02e8CVs7rii0yhTLsgsdId8JDlcLENaqISvkSLFUuZk6NcPeB+FbaTfZorhbSqcRYg==" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/list/main.min.css" integrity="sha512-tNMyUN1gVBvqtboKfcOFOiiDrDR2yNVwRDOD/O+N37mIvlJY5d5bZ0JeUydjqD8evWgE2cF48Gm4KvQzglN0fg==" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/timegrid/main.min.css" integrity="sha512-/Jnt6fX98n8zZyuCt4K81+1eQJhWQn/vyMph1UvHywyziYDbu9DFGcJoW8U73m/rkaQBIEAJeoEj+2Rrx4tFyw==" crossorigin="anonymous" />

        @livewireStyles

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/36efc754ab.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js" integrity="sha512-VQQXLthlZQO00P+uEu4mJ4G4OAgqTtKG1hri56kQY1DtdLeIqhKUp9W/lllDDu3uN3SnUNawpW7lBda8+dSi7w==" crossorigin="anonymous"></script>
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/bootstrap/main.min.js" integrity="sha512-uuua5cS/LUZHEtZiY2s+SRn0h46TbLZjcaf7fztYqdzM+a0t81kw05yLZSjwF3l3lonm53GZ45rSSzAWAwA5Sg==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/locales-all.min.js" integrity="sha512-VsrFSGgqerN0+6shpMgjAs+YVNWb9OWO5mi+Z9Itwe0Di12J/yiK15RzocX4iI3eRuu7RUDXz/I5iQ6D8DMd9w==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/main.min.js" integrity="sha512-bg9ZLPorHGcaLHI2lZEusTDKo0vHdaPOjVOONi4XLJ2N/c1Jn2RVI9qli4sNAziZImX42ecwywzIZiZEzZhokQ==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/daygrid/main.min.js" integrity="sha512-kebSy5Iu+ouq4/swjgEKwa217P2jf/hNYtFEHw7dT+8iLhOKB5PG5xaAMaVyxRK7OT/ddoGCFrg8tslo8SIMmg==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/interaction/main.min.js" integrity="sha512-9M3YQ9E3hEtjRZSQdU1QADaOGxI+JAzq6bieArw7nIxQbPmn10M7TYxhvJZCuvSjlncJG24l+/e5d1bTRN3m4g==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/list/main.min.js" integrity="sha512-Iw4G4+WD3E3F0M+wVZ95nlnifX1xk2JToaD4+AB537HmOImFi79BTtWma57mJeEnK2qNTOgZrYLtAHVsNazzqg==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/timegrid/main.min.js" integrity="sha512-APuj9Rm7J37dj8cRB1qwznH+zrWD7/vkaodDwJVxpdk72m5c9u8mbbdLHn6JnSw5M4AhV8Zb1HnLrNMGoOfR/g==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/luxon/main.min.js" integrity="sha512-glmqwUio1Y8GhDLEgCeT3Hm5cHQ/+RWSY3gtQhtiJa+AwPfFftya0Y7S6TM154wdvf3rkltv14sZKeDq6TW1/w==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/moment-timezone/main.min.js" integrity="sha512-NUpiOuv/aGd/M+dxa43WT/uEiDQ/wAHl9wjuhs4xd7RYxCvGV/sQ6r4oNi7J31mY/HK5BCp91IfHEu1vzbcn2Q==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/moment-timezone/main.min.js" integrity="sha512-NUpiOuv/aGd/M+dxa43WT/uEiDQ/wAHl9wjuhs4xd7RYxCvGV/sQ6r4oNi7J31mY/HK5BCp91IfHEu1vzbcn2Q==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/rrule/main.min.js" integrity="sha512-736Q7KJV3FKRhDcOHCDO/4wutjAS9nYT/zevn4aq2PumUbj1EFmixZDt14O96lCYkazW1wdw2gDPltvEcgbAiw==" crossorigin="anonymous"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    plugins: [ 'dayGrid', 'interaction', 'timeGrid', 'list' ],

                    header:{
                        left:'prev,next today Miboton',
                        center:'title',
                        right:'dayGridMonth,timeGridWeek,timeGridDay'
                    },

                    customButtons: {
                        /* Miboton:{
                            text:'Botón',
                            click:function(){
                                $('#myCalendar').modal('toggle');
                            },
                        } */
                    },

                    dateClick: function(info){
                        $('#myCalendar').modal('toggle');
                        calendar.addEvent({title: 'Evento x', date:info.dateStr})
                    },

                    eventClick: function(info){
                        console.log(info.event.title, info.event.start, info.event.end, info.event.textColor, info.event.backgroundColor, info.event.extendedProps.description);
                    },

                    events:[
                        {
                            title:'Mi evento',
                            start:'2021-04-13 12:30:30',
                            textColor:'white',
                            description:'Descripción del evento 1',
                        },
                        {
                            title:'Mi evento 2',
                            start:'2021-04-25 18:30:30',
                            end:'2021-04-28 18:30:30',
                            color:'green',
                            textColor:'white',
                            description:'Descripción del evento 2',
                        }
                    ]
                });
                calendar.setOption('locale', 'Es')
                calendar.render();
            });

        </script>
        <style>
            #calendar {
                max-width: 900px;
                margin: 40px auto;
            }
        </style>
    </head>
    <body class="font-sans antialiased" id="heading">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            <br>
            <main x-data="{ 'isDialogOpen': false }" @keydown.escape="isDialogOpen = false">
                <section>
                    <a href="#heading" type="button" style="margin: -2px 0px 15px 45px; color:black;" @click="isDialogOpen = true"><img src="{{asset('images/info.png')}}" alt="deletelogo"  style="float: left; width:25%;" >&nbsp;&nbsp;Iconos</a>
                    <!-- overlay -->
                    <div class="overflow-full" style="background-color: rgba(0,0,0,0.5)" x-show="isDialogOpen" :class="{ 'absolute inset-0 z-10 flex items-start justify-center': isDialogOpen }">
                        <!-- dialog -->
                        <div class="bg-white shadow-2xl m-4 sm:m-8" x-show="isDialogOpen" @click.away="isDialogOpen = false">
                            <div class="flex justify-between items-center border-b p-2 text-xl">
                                <h6 class="text-xl font-bold">Significado de los iconos</h6>
                                <button type="button" @click="isDialogOpen = false">✖</button>
                            </div>
                            <div class="p-2">
                                <!-- content -->
                                <aside class="max-w-lg m-2 p-4 bg-yellow-100 border border-yellow-500">
                                    <p>&nbsp;&nbsp;Más información <img src="{{asset('images/information.png')}}" style="float: left;" alt="infologo"></p>
                                    <p>&nbsp;&nbsp;Google map <img src="{{asset('images/map.png')}}" style="float: left;" alt="infologo"></p>
                                    <p>&nbsp;&nbsp;Actualizar <img src="{{asset('images/consent.png')}}" style="float: left;" alt="infologo"></p>
                                    <p>&nbsp;&nbsp;Eliminar <img src="{{asset('images/recycle-bin.png')}}" style="float: left;" alt="infologo"></p>
                                    <p>&nbsp;&nbsp;Ver imágenes <img src="{{asset('images/image.png')}}" style="float: left; width:13%;" alt="infologo"></p>
                                    <p>&nbsp;&nbsp;Añadir elemento <img src="{{asset('images/add-file.png')}}" style="float: left;" alt="infologo"></p>
                                    <p>&nbsp;&nbsp;Guardar información <img src="{{asset('images/sav.png')}}" style="float: left;width:13%;" alt="infologo "></p>
                                    <p>&nbsp;&nbsp;Añadir imágenes <img src="{{asset('images/photo.png')}}" style="float: left;width:13%;" alt="infologo"></p>
                                    <p>&nbsp;&nbsp;Añadir órden <img src="{{asset('images/checklist.png')}}" style="float: left;width:13%;" alt="infologo"></p>
                                    <p>&nbsp;&nbsp;Ir atrás <img src="{{asset('images/previous.png')}}" style="float: left;width:13%;" alt="infologo"></p>
                                </aside>

                            </div>
                        </div><!-- /dialog -->
                    </div><!-- /overlay -->
                </section>
            </main>


            <!--Page footer-->
            <footer class="text-gray-600 body-font">
                <div class="container px-5 py-24 mx-auto flex md:items-center lg:items-start md:flex-row md:flex-nowrap flex-wrap flex-col">
                  <div class="w-64 flex-shrink-0 md:mx-0 mx-auto text-center md:text-left">
                    <a href="{{route('dashboard')}}" class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
                        <i class="fas fa-home"></i>
                      <span class="ml-3 text-xl">Inmodata</span>
                    </a>
                    <p class="mt-2 text-sm text-gray-500">Tu aplicación para gestionar propiedades.</p>
                  </div>
                  <div class="flex-grow flex flex-wrap md:pl-20 -mb-10 md:mt-0 mt-10 md:text-left text-center">
                    <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                      <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">PROPIEDADES</h2>
                      <nav class="list-none mb-10">
                        <li>
                          <a href="{{route('mispropiedades.index')}}" class="text-gray-600 hover:text-gray-800">Mis Propiedades</a>
                        </li>
                        <li>
                          <a href="{{route('mispropiedades.create')}}" class="text-gray-600 hover:text-gray-800">Añadir propiedad</a>
                        </li>
                      </nav>
                    </div>
                    <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                      <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">PROPIETARIOS</h2>
                      <nav class="list-none mb-10">
                        <li>
                          <a href="{{route('mispropietarios.index')}}" class="text-gray-600 hover:text-gray-800">Mis propietarios</a>
                        </li>
                        <li>
                          <a href="{{route('mispropietarios.create')}}" class="text-gray-600 hover:text-gray-800">Añadir propietarios</a>
                        </li>
                      </nav>
                    </div>
                    <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                      <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">CLIETNES</h2>
                      <nav class="list-none mb-10">
                        <li>
                          <a href="{{route('misclientes.index')}}" class="text-gray-600 hover:text-gray-800">Mis clientes</a>
                        </li>
                        <li>
                          <a href="{{route('misclientes.create')}}" class="text-gray-600 hover:text-gray-800">Añadir clientes</a>
                        </li>
                      </nav>
                    </div>
                    <div class="lg:w-1/4 md:w-1/2 w-full px-4">
                      <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">ÓRDENES</h2>
                      <nav class="list-none mb-10">
                        <li>
                          <a href="{{route('ordenes.create')}}" class="text-gray-600 hover:text-gray-800">Añadir órden</a>
                        </li>
                      </nav>
                    </div>
                  </div>
                </div>
                <div class="bg-gray-100 -mt-12">
                  <div class="container mx-auto py-4 px-5 flex flex-wrap flex-col sm:flex-row">
                    <p class="text-gray-500 text-sm text-center sm:text-left">© 2021 Inmodata —
                      <a href="https://github.com/alemelgarejo"  target="_blank" rel="noopener noreferrer" class="text-gray-600 ml-1" target="_blank">@alemelgarejo</a>
                    </p>
                    <span class="inline-flex sm:ml-auto sm:mt-0 mt-2 justify-center sm:justify-start">
                      <a href="https://www.facebook.com/ale.melgarejo.3/"  target="_blank" class="text-gray-500">
                        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                          <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                        </svg>
                      </a>
                      <a href="https://twitter.com/melgarejoale"  target="_blank" class="ml-3 text-gray-500">
                        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                          <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                        </svg>
                      </a>
                      <a href="https://www.instagram.com/alemelgarejo96/"  target="_blank" class="ml-3 text-gray-500">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                          <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                          <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                        </svg>
                      </a>
                      <a href="https://github.com/alemelgarejo"  target="_blank" class="ml-3 text-gray-500">
                        <i class="fab fa-github"></i>
                      </a>
                    </span>
                  </div>
                </div>
              </footer>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
	<script>

	</script>
</html>
