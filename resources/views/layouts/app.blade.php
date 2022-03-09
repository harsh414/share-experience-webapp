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
        <link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <livewire:styles/>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    </head>
    <body class="font-sans bg-gray-background text-gray-900 text-sm" x-data="{top:true}">
        <header class="fixed bg-gray-500 sm:bg-gray-500 z-50 flex flex-col top-0 left-0 right-0 md:flex-row items-center text-white justify-between px-8 py-1"
                        :class="{'bg-black sm:bg-black md:bg-black lg:bg-black ': !top}"
                        @scroll.window="top= (window.pageYOffset)>20 ? false : true">
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
                                    <a href="{{route('logout')}}" style="text-decoration: none" class="hover:text-white"
                                                           onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </a>
                                </form>
                            </div>
                        @else
                            <a href="{{ route('login') }}" style="text-decoration: none" class="hover:text-white">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" style="text-decoration: none" class="ml-4 hover:text-white">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
                <a href="{{route('my-profile')}}">
                    @if(auth()->user())
                    <img src="{{auth()->user()->img_url}}" alt="avatar" class="w-10 h-10 rounded-full">
                    @endif
                </a>
            </div>
        </header>

        <main class="container max-w-custom mx-auto pt-36 sm:pt-36 md:pt-24 flex flex-col sm:flex-col md:flex-row">
            <div class="container mx-auto sm:mx-auto md:mr-5 ml-48 md:ml-0 w-80 sm:w-80 md:w-80 text-center mr-5 flex flex-col">
                <livewire:experience-form-interview/>
                <livewire:ask-a-question/>
            </div>
            <div class="w-175 mt-8 sm:mt-8 md:mt-0">
                <nav class="flex flex-col sm:flex-col md:flex-row items-center justify-between text-xs sm:pt-4 md:pt-0">
                    <ul class="flex uppercase font-bold border-b-4 pb-3 space-x-10" id="tabs">
                        <li><a href="{{route('home')}}" id="my-shares" class="border-b-4 pb-3 border-blue transition duration-150 ease-in hover:border-blue">All Shares</a></li>
                        <li><a href="{{route('my-experiences')}}" id="my-exp" class="text-gray-400 border-b-4 pb-3 transition duration-150 ease-in hover:border-blue">My shared experiences</a></li>
                        <li><a href="{{route('recently-asked')}}" id="my-questions" class="text-gray-400 border-b-4 pb-3 transition duration-150 ease-in hover:border-blue">Recent experiences Request</a></li>
                    </ul>
                    <ul class="flex uppercase font-bold border-b-4 pb-3 space-x-10 sm:pt-4 md:pt-0 mt-4 sm:mt-4 md:mt-0">
                        <li><a href="{{route('my-involvements')}}" id="my-involvements" class="text-gray-400 border-b-4 pb-3 transition duration-150 ease-in hover:border-blue">My Involvements</a></li>
                    </ul>
                </nav>

                <div class="mt-8">
                    @yield('content')
                </div>
            </div>
        </main>
    <livewire:scripts/>
    </body>
    <script type="text/javascript">

        $(document).ready(function (){
            var url= window.location.pathname;
            var arr = url.split('/');
            var curr_tab= arr[3];  //local
            // var curr_tab= arr[2];  //production
            if (curr_tab==""){
                $("#my-shares").addClass('border-blue');
                $("#my-questions").removeClass('border-blue');
                $("#my-exp").removeClass('border-blue');
                $("#my-involvements").removeClass('border-blue');
            }else if (curr_tab=="my-shared-experiences"){
                $("#my-shares").removeClass('border-blue');
                $("#my-questions").removeClass('border-blue');
                $("#my-exp").addClass('border-blue');
                $("#my-involvements").removeClass('border-blue');
            }else if (curr_tab=="recently-asked"){
                $("#my-shares").removeClass('border-blue');
                $("#my-questions").addClass('border-blue');
                $("#my-exp").removeClass('border-blue');
                $("#my-involvements").removeClass('border-blue');
            }else if (curr_tab=="my-involvements"){
                $("#my-shares").removeClass('border-blue');
                $("#my-involvements").addClass('border-blue');
                $("#my-exp").removeClass('border-blue');
                $("#my-questions").removeClass('border-blue');
            }
        })
    </script>
    @yield('scripts')
</html>
