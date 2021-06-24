@extends('layouts.app')
@section('content')
    <div class="idea-container bg-white rounded-xl flex mt-4">
        <div class="flex flex-1 px-4 py-6">
            <div class="flex-none">
                <a href="#">
                    <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar" class="w-14 h-14 rounded-xl">
                </a>
            </div>
            <div class="w-full mx-4">
                <h4 class="text-xl font-semibold">
                    <a href="#" class="hover:underline">A random title can go here</a>
                </h4>
                <div class="text-gray-600 mt-3">
                    Lorem ipsum dolor sit amet consectetur. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet officia doloribus quibusdam dolorem quod velit repellat obcaecati doloremque, nulla iusto modi hic. Dolore possimus consequuntur et recusandae laboriosam? Esse, culpa.
                </div>

                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                        <div class="font-bold text-gray-900">John Doe</div>
                        <div>&bull;</div>
                        <div>{{$experience->created_at->diffForHumans()}}</div>
                        <div>&bull;</div>
                        <div>{{$experience->category}}</div>
                        <div>&bull;</div>
                        <div class="text-gray-900">{{$experience->comments()->count()}} Comments</div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button class="relative bg-gray-100 hover:bg-gray-200 border rounded-full h-7 transition duration-150 ease-in py-2 px-3">
                            <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                            <ul class="hidden absolute w-44 text-left font-semibold bg-white shadow-dialog rounded-xl py-3 ml-8">
                                <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Mark as Spam</a></li>
                                <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Delete Post</a></li>
                            </ul>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end idea-container -->
    <div x-data="{commentOpen:false}"> <!--div for comment Alpine -->
        <div class="buttons-container flex items-center justify-between mt-6"><!--buttons container -->
            <div class="flex items-center space-x-4 ml-6">
                <button type="button" class="flex focus:outline-none items-center justify-center h-11 w-32 text-xs bg-blue text-white font-semibold rounded-xl
                 border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3" @click="{commentOpen=!commentOpen}">
                    <span class="ml-1">Comment</span>
                </button>
            </div>

            <div class="flex items-center space-x-3">
                <div class="bg-white font-semibold text-center rounded-xl px-3 py-2">
                    <div class="text-xl leading-snug">12</div>
                    <div class="text-gray-400 text-xs leading-none">Votes</div>
                </div>
                <button
                    type="button"
                    class="w-32 h-11 text-xs bg-gray-200 font-semibold uppercase rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3"
                >
                    <span>Vote</span>
                </button>
            </div>
        </div> <!-- end buttons-container -->

        <livewire:new-comment :experience="$experience" :wire:key="$experience->id"/> <!--livewire for adding new comment and rendering comment block-->
    </div>
@endsection
