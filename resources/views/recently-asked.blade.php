@extends('layouts.app')
@section('content')
    <div class="experiences-container my-6 space-y-6" x-data="{flashMessage:true}">
        @foreach($questions as $q)
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
                @if($q->ifSharedForThisQuestion($q))
                    <div class="description px-4 py-2" style="background-color: #80ffcc">
                        You shared your experience for this question
                    </div>
                @endif
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
