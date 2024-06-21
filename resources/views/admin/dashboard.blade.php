<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <!--<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
        
-->
        
    @vite('resources/css/app.css')
    </head>
    <body class="font-sans antialiased  ">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <div class="relative min-h-screen flex flex-col items-center  selection:bg-[#FF2D20] selection:text-white">
                
                <header class="fixed top-0 left-0 right-0 z-50 w-full max-w-2xl px-6 lg:max-w-7xl bg-gray-50  p-4 grid grid-cols-2 items-center gap-2 lg:grid-cols-3 rounded-md border border-gray-300">     <div class="flex  lg:col-start-1">
                            <h1 class="font-serif text-4xl ml-6 text-blue-800 font-bold">Events</h1>
                            </div>
                           
                            @if (Route::has('login'))
                                <nav class="mx-3 lg:col-start-3 gap-4  flex flex-1 justify-end">
                                    
                                    @auth
                                        <a
                                            href="{{ url('/dashboard') }}"
                                            class="rounded-md  px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        >
                                            Dashboard
                                        </a>
                                        

                                       
                                    @endauth
                                </nav>
                            @endif
                </header>

                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl mt-24">
                        <main class="mt-6">
                           
                            
                            <div class="bg-yellow-400 w-32  h-10 rounded-md flex ">
                            <a href="{{ route('events.create') }}" class="rounded-md text-gray-800 px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/40 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Create Events
                            </a>
                            </div>
                              
                            <hr class="border-t border-gray-300 my-4">
                            <h1 class="event-title flex justify-center font-bold font-serif  text-3xl">Ville</h1>
                            <div class="flex">
                                <div class="grid gap-8 lg:grid-cols-3 lg:gap-8">
                                @foreach ($events as $event)
                                    <a href="https://laravel.com/docs" id="docs-card" class="event-card">
                                        <div class="relative flex items-center gap-6 lg:items-end">
                                            <div id="docs-card-content" class="event-content">
                                                <div class="pt-3 sm:pt-5 lg:pt-0">
                                                    <img src="{{asset('image/photo.jpg')}}" alt="photo" class=" rounded-md">
                                                    @if ($event->user)
                                                    <h2 class="mt-2 text-2xl text-blue-800  ring-transparent transition hover:text-blue-400">Organized by: {{ $event->user->name }}</h2>
                                                    @else
                                                    <h2 class="mt-2 text-2xl text-blue-800  ring-transparent transition hover:text-blue-400">Organized by: N/A</h2>
                                                    @endif
                                                    <p class="mt-2 font-bold text-xl">{{ $event->title }}</p>
                                                    <h6 class="text-sm">Date: {{ $event->date }}</h6>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="192" height="192" viewBox="0 0 48 48"><path fill="none" stroke="#b0b0b0" stroke-linecap="round" stroke-linejoin="round" d="M17.218 8.018a.97.97 0 0 0-.866-.532H6.473a.972.972 0 0 0-.867 1.412L13.27 24L5.606 39.102a.972.972 0 0 0 .867 1.412h9.878a.97.97 0 0 0 .867-.532L25.328 24z"/><path fill="none" stroke="#b0b0b0" stroke-linecap="round" stroke-linejoin="round" d="M34.39 8.018a.97.97 0 0 0-.866-.532h-9.879a.972.972 0 0 0-.866 1.412L30.442 24l-7.663 15.102a.972.972 0 0 0 .866 1.412h9.879a.97.97 0 0 0 .867-.532L42.5 24z"/></svg>
                            </div>
                            <div class="p-20">
                            <button class="mt-4 px-4 py-2 bg-gray-100 w-72 font-semibold rounded-md shadow hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400">
                                See More
                            </button>

                            </div>
                            
                        </main>


                        <footer class="flex justify-center py-16 text-center text-sm text-black dark:text-white/70">
                        <svg class="mt-1" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 22 22"><path fill="currentColor" d="M15 1v1h2v1h1v1h1v1h1v2h1v8h-1v2h-1v1h-1v1h-1v1h-2v1H7v-1H5v-1H4v-1H3v-1H2v-2H1V7h1V5h1V4h1V3h1V2h2V1zm-1 2H8v1H6v1H5v1H4v2H3v6h1v2h1v1h1v1h2v1h6v-1h2v-1h1v-1h1v-2h1V8h-1V6h-1V5h-1V4h-2zM9 6h4v1h1v2h-2V8h-2v6h2v-1h2v2h-1v1H9v-1H8V7h1z"/></svg>
                           <p class="ml-2" > 2024 Events </p>
                        </footer>
                </div>
            </div>
        </div>
    </body>
</html>
