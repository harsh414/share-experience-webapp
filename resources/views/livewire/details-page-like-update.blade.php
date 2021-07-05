<div class="flex items-center space-x-3">
    <div class="bg-white font-semibold text-center rounded-xl px-3 py-2">
        <div class="text-xl leading-snug">{{$experience->num_likes($experience)->count()}}</div>
        <div class="text-gray-400 text-xs leading-none">Likes</div>
    </div>
    @if($experience->ifLikedBy(auth()->user(), $experience))
        <button wire:click="likeUpdate" class="text-center text-white bg-blue transition ease-in  px-5 py-2 focus:outline-none rounded-xl font-semibold">
            Liked
        </button>
    @else
        <button wire:click="likeUpdate" class="text-center border border-gray-300 bg-gray-200 px-5 py-2 focus:outline-none rounded-xl font-semibold">
            Like
        </button>
    @endif
</div>
