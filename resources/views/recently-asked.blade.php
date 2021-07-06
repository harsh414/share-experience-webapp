@extends('layouts.app')
@section('content')
    <div class="experiences-container my-6 space-y-6" x-data="{flashMessage:true}">
        @foreach($questions as $q)
            <div class="experience-container flex flex-col-reverse sm:flex-col-reverse md:flex-row bg-white rounded-xl">
                <div class="profile-container bg-gray-100 border-r text-center border-gray-100 px-2 py-5"> <!-- profile container-->
                    <div class="font-extrabold text-sm pb-2">Author</div>
                    <div>
                        <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp" alt="avatar" class="w-10 h-10 mx-auto rounded-full">
                    </div>
                    <div class="text-center font-semibold text-xs mt-2">
                        {{$q->user->name}}
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
                                            <form action="" method="POST">
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
        @endforeach
    </div>
@endsection
