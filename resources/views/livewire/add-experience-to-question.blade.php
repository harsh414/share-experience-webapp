<div>
    <div x-data="{addReplyOpen:false}"> <!--div for comment Alpine -->
        <div class="buttons-container flex items-center justify-between mt-6"><!--buttons container -->
            <div class="flex items-center space-x-4 ml-6">
                <button type="button" class="flex focus:outline-none items-center justify-center h-8 w-48 text-xs bg-blue text-white font-semibold rounded-xl
                     border border-blue hover:bg-blue-hover transition duration-150 ease-in px-3 py-3" @click="{addReplyOpen=!addReplyOpen}">
                    <span class="ml-1">Reply with your experience</span>
                </button>
            </div>
        </div> <!-- end buttons-container -->

        <div class="bg-white border-2 border-blue rounded-xl mt-8" x-show="addReplyOpen"
             style="border-image-source: linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
                                border-image-slice: 1;background-image: linear-gradient(to bottom, #ffffff, #ffffff), linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
                                background-origin: border-box;background-clip: content-box, border-box;">
            <div class="text-center px-3 py-2 pt-3" x-data="{flashMessage:true}">
                <p class="text-xs mt-4 pb-6">Reply the question by adding your experience</p>
                @error('company_name') <span class="cursor-pointer error bg-gray-500 text-white rounded-xl w-full p-2"> {{ $message }} x</span> @enderror
                @error('title') <span class="error bg-gray-500 text-white rounded-xl w-full p-2"> {{ $message }}</span> @enderror
                @error('experience') <span class="error bg-gray-500 text-white rounded-xl w-full p-2"> {{ $message }}</span> @enderror
                    <div class="pt-6">
                        <select name="category_add" id="category_add" class="w-full bg-gray-100 text-sm rounded-xl border-none px-4 py-2">
                            <option value="{{$question->category}}">{{$question->category}}</option>
                        </select>
                    </div>
                    <div>
                        <input type="text" wire:model.lazy="company_name" name="company_name" id="company_name" class="pb-2 bg-white text-sm border-none w-full text-sm rounded mt-4 placeholder-gray-500" placeholder="Company Name" >
                    </div>
                    <div>
                        <input type="text" wire:model.lazy="title" name="title" id="title" class="bg-white text-sm border-none w-full text-sm rounded mt-4 placeholder-gray-500" placeholder="Title" >
                    </div>
                    <div class="mt-4">
                        <textarea name="experience" wire:model.lazy="experience" id="experience" cols="30" rows="16" class="w-full bg-gray-100 rounded-xl border-none placeholder-gray-900 text-sm px-4 py-2" placeholder="Share your experience :)"></textarea>
                    </div>
                    <div class="flex items-center justify-between space-x-3 mt-2">
                        <button type="submit" wire:click.prevent="addExperienceToQuestion" class="flex items-center focus:outline-none justify-center w-36 h-9 text-xs bg-blue text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">
                            <svg wire:loading wire:target="addExperienceToQuestion" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                      d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            <span class="ml-1" @click="addReplyOpen=false">Share Now</span>
                        </button>
                    </div>
            </div>
        </div>
        <div class="font-bold text-lg text-gray-500 mt-3 px-3 py-2 text-right">Replies to this question</div>
        @foreach($question->experiences()->latest()->get() as $exp)
            <div class="experience-container flex flex-col-reverse mt-8 sm:flex-col-reverse md:flex-row bg-white rounded-xl">
                <!--     |votes| |profile| |all other information|     flex flow   -->
                @if(auth()->user())
                    <livewire:like-update :experience="$exp" wire:key="{{$exp->id}}"/>
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
                                    <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                                    <ul @click.away="toggleOpen=false" class="absolute text-left space-y-2 pl-2 ml-12 w-36 sm:w-36 md:w-44 shadow-lg bg-white rounded-xl py-2" x-show="toggleOpen">
                                        <li>
                                            <a href="#" class="bg-white hover:bg-gray-200 block transition duration-150 ease-in">
                                                Mark as Inappropriate
                                            </a>
                                        </li>
                                        @if(auth()->user() && auth()->user()->id === $exp->user->id)
                                            <form action="{{route('delete-experience',$exp->id)}}" method="POST">
                                                {{@csrf_field()}}
                                                <li>
                                                    <a class="bg-white hover:bg-gray-200 block transition duration-150 ease-in" onclick="$(this).closest('form').submit();">
                                                        Delete Experience  <!--if it belongs to auth user -->
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
        @endforeach
    </div>
</div>
