@extends('layouts.app')
@section('content')
    <div class="filters flex flex-col md:flex-row space-x-10">
        <div class="md:w-2/3">
            <?php
            $categories= array('Your-asked-questions','Your-likes');
            ?>
            <form action="{{route('categoryMyInvolvement')}}" method="POST">
                {{ csrf_field() }}
                <select name="category" onchange="this.form.submit()" id="category" class="w-full text-sm rounded-xl px-3 py-2 border-none">
                    @if(isset($choosen) && $choosen!=NULL)
                        <option value="{{$choosen}}">{{$choosen}}</option>
                    @else
                        <?php $categoryChanged=null; ?>
                    @endif
                    @foreach($categories as $category)
                        @if($category != $choosen)
                            <option value="{{$category}}">{{$category}}</option>
                        @endif
                    @endforeach
                </select>
            </form>
        </div>
    </div>
    <!-----------------------------------  AUTH USER QUESTIONS  ----------------------------------------------->
    <div class="content-container my-6 space-y-10" x-data="{flashMessage:true}">
    @if(session()->has('removal_success_question'))
        <div class="bg-indigo-900 text-center py-2 lg:px-4 mb-4" x-show="flashMessage">
            <div class="p-1 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                <span class="font-semibold mr-2 text-left flex-auto">{{session()->get('removal_success_question')}}</span>
                <svg @click="flashMessage=false" xmlns="http://www.w3.org/2000/svg" class="cursor-pointer h-6 w-6 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
        </div>
    @endif
    @if($choosen==NULL || $choosen=='Your-asked-questions')
            @foreach(auth()->user()->questions as $q)
                <div>
                    <div class="bg- py-1 border text-sm flex items-center justify-between px-2" style="background-color: #b3ffe0">
                        <div><span class="font-bold">Asked for:</span> {{$q->category}}</div>
                        @if($q->experiences()->count())
                            <button class="px-2 bg-gray-400 rounded-lg px-4 py-1 text-xs font-semibold focus:outline-none">
                                <span class="font-extrabold">{{$q->experiences()->count()}}</span> Responses </button>
                        @else
                            <button class="px-2 rounded-lg px-4 py-1 text-xs font-semibold focus:outline-none" style="background:#a3a375">
                                <span class="font-extrabold">{{$q->experiences()->count()}}</span> Responses </button>
                        @endif
                    </div>
                    <div class="experience-container flex flex-col-reverse sm:flex-col-reverse md:flex-row bg-white rounded-xl">
                        <div class="profile-container bg-gray-300 border-r text-center border-gray-100 px-2 py-5"> <!-- profile container-->
                            <div class="font-extrabold text-sm pb-2">Author</div>
                            <div>
                                <img src="{{$q->user->img_url}}" alt="avatar" class="w-10 h-10 mx-auto rounded-full">
                            </div>
                            <div class="text-center font-semibold text-xs mt-2">
                                {{$q->user->name}}
                            </div>
                            <div class="mt-2 sm:mt-2 text-center md:mt-4 text-xs md:w-28">
                                SE at infosys,intern at idealVillage
                            </div>
                        </div>

                        <div class="description py-2 pl-1 pr-3 w-full bg-gray-100">
                            <div class="flex-col">
                                <div class="flex justify-between px-2  text-xs border-b border-gray-100">
                                    <div class="font-semibold">
                                        Category:
                                        <span class="font-normal"> {{$q->category}}</span>
                                    </div>
                                    <div class="font-semibold ml-8 sm:ml-8 md:ml-28">
                                        Company:
                                        <span class="font-normal">{{$q->company_name}}</span>
                                    </div>
                                </div>

                                <div class="description px-3 py-3">
                                    <div class="mt-3 text-sm">
                                        <?php $out = strlen($q->description) > 200 ? substr($q->description,0,200)."......" : $q->description; ?>
                                        <?php echo $out ?>
                                    </div>
                                </div>

                                <div class="flex items-center justify-start px-4 md:mt-6 ml-4">
                                    <div class="text-gray-500 text-xs space-x-2">{{$q->created_at->diffForHumans()}}</div>
                                    <div class="flex ml-52 sm:ml-52 md:ml-28">
                                        <a href="{{route('question-details',$q->id)}}">
                                            <button class="bg-gray-300 focus:outline-none rounded-xl font-semibold px-4 py-0.5 mb-1">
                                                Open
                                            </button>
                                        </a>
                                        @if(auth()->user()  && $q->user->id == auth()->user()->id)
                                            <button class="relative bg-gray-100 focus:outline-none rounded-full h-7 px-2 py-0.5 ml-3" x-data="{toggleOpen:false}"
                                                    @click="toggleOpen = !toggleOpen">
                                                <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                                                <ul @click.away="toggleOpen=false" class="absolute text-left space-y-2 pl-2 ml-12 w-36 sm:w-36 md:w-44 shadow-lg bg-white rounded-xl py-2" x-show="toggleOpen">
                                                    <form action="{{route('removeQuestion',$q->id)}}" method="POST">
                                                        {{@csrf_field()}}
                                                        <li>
                                                            <a class="bg-white hover:bg-gray-200 block transition duration-150 ease-in" onclick="$(this).closest('form').submit();">
                                                                Remove Question  <!--if it belongs to auth user -->
                                                            </a>
                                                        </li>
                                                    </form>
                                                </ul>
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
    @endif
    </div>
    <!---------------------------------------- AUTH QUESTIONS ENDS-------------------------------------->

    <!-- ---------------------------------------LIKES SECTION STARTS---------------------------------  -->
    @if($choosen=='Your-likes')
        <div class="experiences-container my-6 space-y-10">
            @foreach($returned as $exp)
                @if(auth()->user() && auth()->user()->ifMarkedAsInappropriate($exp->id))
                <div class="border border-red" style="filter: blur(1px);-webkit-filter: blur(1px);">
                <div class="text-center font-bold" style="background:#e6b3cc">Marked as Inappropriate</div>
                @else
                <div>
                @endif
                    @if($exp->was_asked && $exp->question_id)
                        <div class="bg-gray-400 py-1 text-sm flex items-center justify-between px-2">
                            <div>
                                <span class="font-bold">Asked for:</span> {{$exp->question->category}}
                            </div>
                            <a href="{{route('question-details',$exp->question->id)}}">
                                <button class="focus:outline-none justify-center w-28 h-8 text-xs bg-gray-600 text-white font-semibold rounded-xl transition duration-150 ease-in px-1 py-1">
                                    Question link
                                </button>
                            </a>
                        </div>
                        <div class="description bg-gray-300 px-4 py-2">
                            <?php $out = strlen($exp->question->description) > 200 ? substr($exp->question->description,0,200)."......" : $exp->question->description; ?>
                            <?php echo $out ?>
                        </div>
                        <div>

                        </div>
                    @endif
                    <div class="experience-container flex flex-col-reverse sm:flex-col-reverse md:flex-row bg-white rounded-xl">
                        <!--     |votes| |profile| |all other information|     flex flow   -->
                        @if(auth()->user())
                            <livewire:like-update :experience="$exp"/>
                        @else
                            <div class="border-r border-gray-100 px-5 py-4 sm:py-4 md:py-12 text-center bg-gray-200"> <!-- votes container-->
                                <div class="text-center sm:text-2xl md:text-3xl font-extrabold">
                                    {{$exp->num_likes($exp)->count()}}
                                </div>
                                <div class="text-center text-xs">
                                    LIKES
                                </div>
                                <div class="mt-3 sm:mt-3 md:mt-8">
                                    <a href="{{route('login')}}">
                                        <button class="text-center border border-gray-300  px-5 py-2 focus:outline-none rounded-xl font-semibold">
                                            Like
                                        </button>
                                    </a>
                                </div>
                            </div>
                        @endif

                        <div class="profile-container bg-gray-100 border-r text-center border-gray-100 px-2 py-5"> <!-- profile container-->
                            <div>
                                <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp" alt="avatar" class="w-10 h-10 mx-auto rounded-full">
                            </div>
                            <div class="text-center font-semibold text-xs mt-2">
                                {{$exp->user->name}}
                            </div>
                            <div class="mt-2 sm:mt-2 text-center md:mt-4 text-xs md:w-28">
                                SE at infosys,intern at idealVillage
                            </div>
                        </div>

                        <div class="description py-2 pl-1 pr-3">
                            <div class="flex-col">
                                <div class="flex justify-between px-2  text-xs border-b border-gray-100">
                                    <div class="font-semibold">
                                        Category:
                                        <span class="font-normal"> {{$exp->category}}</span>
                                    </div>
                                    <div class="font-semibold ml-8 sm:ml-8 md:ml-28">
                                        Company:
                                        <span class="font-normal">{{$exp->company_name}}</span>
                                    </div>
                                </div>

                                <div class="description px-3 py-3">
                                    <div class="title text-lg font-semibold mt-2">
                                        {{$exp->title}}
                                    </div>
                                    <div class="mt-3 text-sm">
                                        <?php $out = strlen($exp->description) > 200 ? substr($exp->description,0,200)."......" : $exp->description; ?>
                                        <?php echo $out ?>
                                    </div>
                                </div>

                                <div class="flex items-center justify-start px-4 md:mt-6 ml-4">
                                    <div class="text-gray-500 text-xs space-x-2">{{$exp->created_at->diffForHumans()}}</div>
                                    <div class="bg-gray-300 h-2 w-2 rounded-full ml-1"></div>
                                    <div class="text-gray-500 text-xs space-x-2 ml-1">{{$exp->comments()->count()}} comments</div>
                                    <div class="flex ml-52 sm:ml-52 md:ml-28">
                                        <a href="{{route('experience-details',$exp->id)}}">
                                            <button class="bg-gray-300 focus:outline-none rounded-xl font-semibold px-4 py-0.5 mb-1">
                                                Open
                                            </button>
                                        </a>
                                        <button class="relative bg-gray-100 focus:outline-none rounded-full h-7 px-2 py-0.5 ml-3" x-data="{toggleOpen:false}"
                                                @click="toggleOpen = !toggleOpen">
                                            <svg fill="currentColor" width="24" height="6"><path fill="#73767a" d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                                            <ul @click.away="toggleOpen=false" class="absolute text-left space-y-2 pl-2 ml-12 w-36 sm:w-36 md:w-44 shadow-lg bg-white rounded-xl py-2" x-show="toggleOpen">
                                                @if(auth()->user())
                                                    <form action="{{route('mark-as-inappropriate',$exp->id)}}" method="POST">
                                                        {{@csrf_field()}}
                                                        <li>
                                                            <a class="bg-white hover:bg-gray-200 block transition duration-150 ease-in" onclick="$(this).closest('form').submit();">
                                                                {{$exp->ifMarkedWrongBy(auth()->user()) ? 'Make Appropriate': 'Mark as Inappropriate'}}
                                                            </a>
                                                        </li>
                                                    </form>
                                                @endif
                                            </ul>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

@endsection
