<div class="w-2/3 relative sm:pt-4 md:pt-0">
    <input type="search" wire:model="search" class="w-full rounded-xl text-sm bg-white px-3 py-2 pl-8 border-none" placeholder="start searching.. :)">
    <div class="absolute top-0 flex items-center h-full ml-2 sm:pt-3 md:pt-0">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" class="" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
    </div>
    @if(strlen($search)>=2)
        <div class="absolute bg-gray-800 w-full mt-4 z-40">
            <ul class="bg-green">
                @foreach($searchResult as $result)
                    <li class="border border-b border-gray-700 text-white">
                        <a href="{{route('experience-details',$result->id)}}" class="block flex hover:bg-gray-800 hover:text-white flex flex-row px-3 py-3">
                            <div class="flex-col flex-wrap w-16 border-r border-gray-700 pr-2">
                                <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp" alt="avatar" class="w-10 h-10 rounded-full">
                                <div class="pt-2">{{$result->name}}</div>
                            </div>
                            <div class="flex-col pl-2">
                                <div class="border-b">
                                <span class="ml-3 mt-1 w-full text-sm"> {{$result->title}}</span>
                                </div>
                                <div class="mt-4 text-xs">
                                    <?php $out = strlen($result->description) > 60 ? substr($result->description,0,60)."......" : $result->description; ?>
                                    <?php echo $out ?>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

