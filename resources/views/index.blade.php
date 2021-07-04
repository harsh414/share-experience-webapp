@extends('layouts.app')
@section('content')
    <div class="filters flex flex-col md:flex-row space-x-10">
            <div class="md:w-1/3">
                <?php
                $categories= array('All-Experiences','Interview-Experience','Internship-Experience');
                ?>
                <form action="" method="POST">
                    {{ csrf_field() }}
                    <select name="category" onchange="this.form.submit()" id="category" class="w-full text-sm rounded-xl px-3 py-2 border-none">
                        @if(isset($categoryChanged))
                            <option value="{{$categoryChanged}}">{{$categoryChanged}}</option>
                        @else
                            <?php $categoryChanged=null; ?>
                        @endif
                        @foreach($categories as $category)
                            @if($category != $categoryChanged)
                            <option value="{{$category}}">{{$category}}</option>
                            @endif
                        @endforeach
                    </select>
                </form>
            </div>
        <livewire:search-dropdown/>
    </div> <!--filters ends -->
    <div class="experiences-container my-6 space-y-6">
        @foreach($experiences as $exp)
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
                                <button class="text-center bg-gray-200 px-5 py-2 focus:outline-none rounded-xl font-semibold">
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
                        Harsh agarwal
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
                            <div class="text-gray-500 text-xs space-x-2">10 hours ago</div>
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
                                    <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                                    <ul @click.away="toggleOpen=false" class="absolute text-left space-y-2 pl-2 ml-12 w-36 sm:w-36 md:w-44 shadow-lg bg-white rounded-xl py-2" x-show="toggleOpen">
                                        <li>
                                            <a href="#" class="bg-white hover:bg-gray-200 block transition duration-150 ease-in">
                                            Mark as Inappropriate
                                            </a>
                                        </li>
                                        @if(auth() && auth()->user()->id === $exp->user->id)
                                            <li>
                                                <a href="#" class="bg-white hover:bg-gray-200 block transition duration-150 ease-in">
                                                    Delete Experience  <!--if it belongs to auth user -->
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

