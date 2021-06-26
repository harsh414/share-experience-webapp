<div class="border-r border-gray-100 px-5 py-4 sm:py-4 md:py-12 text-center"> <!-- votes container-->
    <div class="text-center sm:text-2xl md:text-3xl font-extrabold">
        {{$experience->num_likes($experience)->count()}}
    </div>
    <div class="text-center text-xs">
        LIKES
    </div>
    <div class="mt-3 sm:mt-3 md:mt-8">
        @if($experience->ifLikedBy(auth()->user(), $experience))
            <button wire:click="likeUpdate" class="text-center text-white bg-blue transition ease-in  px-5 py-2 focus:outline-none rounded-xl font-semibold">
                Liked
            </button>
        @else
            <button wire:click="likeUpdate" class="text-center bg-gray-200 px-5 py-2 focus:outline-none rounded-xl font-semibold">
                Like
            </button>
        @endif
    </div>
</div>
