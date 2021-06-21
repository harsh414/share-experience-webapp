<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Experiences</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans bg-gray-background text-gray-900 text-sm" x-data="{top:true}">
        <header class="fixed  md:bg-gray-300 z-50 flex flex-col top-0 left-0 right-0 md:flex-row items-center text-white justify-between px-8 py-1"
                        :class="{'bg-black sm:bg-black md:bg-black lg:bg-black ': !top}"
                        @scroll.window="top= (window.pageYOffset)>30 ? false : true">
            <a href="#">Logo goes here</a>
            <div class="flex items-center justify-between">
                @if (Route::has('login'))
                    <div class="px-6 py-4 sm:block">
                        @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a href="{{route('logout')}}"
                                                       onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
                <a href="#">
                    <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp" alt="avatar" class="w-10 h-10 rounded-full">
                </a>
            </div>
        </header>

        <main class="container max-w-custom mx-auto pt-36 sm:pt-36 md:pt-24 flex flex-col sm:flex-col md:flex-row">
            <div class="container mx-auto sm:mx-auto md:mr-5 ml-36 md:ml-0 md:w-70 text-center mr-5 flex flex-col">
                <div style="border: 1px solid black">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem corporis cum dolores, harum hic id in iste iure modi, perspiciatis quaerat vero. Aperiam, excepturi hic magni nesciunt nulla tempore tenetur!</div>
                <div class="mt-8 sm:mt-8 md:mt-40">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem corporis cum dolores, harum hic id in iste iure modi, perspiciatis quaerat vero. Aperiam, excepturi hic magni nesciunt nulla tempore tenetur!</div>
            </div>
            <div class="w-175 mt-8 sm:mt-8 md:mt-0">
                <nav class="flex flex-col sm:flex-col md:flex-row items-center justify-between text-xs sm:pt-4 md:pt-0">
                    <ul class="flex uppercase font-bold border-b-4 pb-3 space-x-10">
                        <li><a href="" class="border-b-4 pb-3 border-blue">All Shares</a></li>
                        <li><a href="" class="text-gray-400 border-b-4 pb-3 transition duration-150 ease-in hover:border-blue">My shared experiences</a></li>
                        <li><a href="" class="text-gray-400 border-b-4 pb-3 transition duration-150 ease-in hover:border-blue">Recently asked</a></li>
                    </ul>
                    <ul class="flex uppercase font-bold border-b-4 pb-3 space-x-10 sm:pt-4 md:pt-0 mt-4 sm:mt-4 md:mt-0">
                        <li><a href="" class="text-gray-400 border-b-4 pb-3 transition duration-150 ease-in hover:border-blue">My Involvements</a></li>
                    </ul>
                </nav>

                <div class="mt-8">
                    @yield('content')
                </div>
            </div>
        </main>
    </body>
</html>
