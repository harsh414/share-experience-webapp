<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/css/bootstrap-tokenfield.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tokenfield/0.12.0/bootstrap-tokenfield.js"></script>
    <style>
        .tokenfield .token{
            background-color: cadetblue;
            color: white;
            padding: 3px;
        }
    </style>
    <livewire:styles/>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="font-sans bg-gray-200 text-gray-900 text-sm" x-data="{top:true}">
<header class="fixed bg-gray-500 sm:bg-gray-500 z-50 flex flex-col top-0 left-0 right-0 md:flex-row items-center text-white justify-between px-8 py-1"
        :class="{'bg-black sm:bg-black md:bg-black lg:bg-black ': !top}"
        @scroll.window="top= (window.pageYOffset)>30 ? false : true">
    <a href="{{route('home')}}" class="flex items-center justify-between space-x-2 hover:text-gray-200" style="text-decoration: none">
        <img src="https://res.cloudinary.com/dkerurdbc/image/upload/v1626028809/Free_Sample_By_Wix_2_vos1qi.jpg" class="h-12 w-12 rounded-full" alt="">
        <div class="pl-4 text-lg">ShareAndGrow</div>
    </a>
    <div class="flex items-center justify-between">
        @if (Route::has('login'))
            <div class="px-6 py-4 sm:block">
                @auth
                    <div class="flex justify-between space-x-6">
                        <div>{{auth()->user()->name}}</div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{route('logout')}}"
                               onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <a href="{{route('my-profile')}}">
            <img src="{{auth()->user()->img_url}}" alt="avatar" class="w-10 h-10 rounded-full">
        </a>
    </div>
</header>
@yield('content')
@yield('scripts')
</body>
</html>
