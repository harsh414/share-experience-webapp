@extends('layouts.app')
@section('content')
    <div class="question-container bg-white rounded-xl flex mt-4">
        <div class="flex flex-1 px-4 py-6">
            <div class="flex-none">
                <a href="#">
                    <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar" class="w-14 h-14 rounded-xl">
                </a>
            </div>
            <div class="w-full mx-4">
                <div class="text-gray-600 mt-3">
                    Lorem ipsum dolor sit amet consectetur. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet officia doloribus quibusdam dolorem quod velit repellat obcaecati doloremque, nulla iusto modi hic. Dolore possimus consequuntur et recusandae laboriosam? Esse, culpa.
                </div>
                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                        <div class="font-bold text-gray-900">John Doe</div>
                        <div>&bull;</div>
                        <div>{{$question->created_at->diffForHumans()}}</div>
                        <div>&bull;</div>
                        <div>{{$question->category}}</div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button class="relative bg-gray-100 focus:outline-none rounded-full h-7 px-2 py-0.5 ml-3" x-data="{toggleOpen:false}"
                                @click="toggleOpen = !toggleOpen">
                            <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                            <ul @click.away="toggleOpen=false" class="absolute text-left space-y-2 pl-2 ml-12 w-36 sm:w-36 md:w-44 shadow-lg bg-white rounded-xl py-2" x-show="toggleOpen">
                                @if(auth()->user() && auth()->user()->id === $question->user->id)
                                    <li>
                                        <a href="#" class="bg-white hover:bg-gray-200 block transition duration-150 ease-in">
                                            Remove Question  <!--if it belongs to auth user -->
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end question-container -->
    <livewire:add-experience-to-question :question="$question"/>

@endsection
