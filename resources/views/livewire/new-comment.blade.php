<div class="ml-4">
    <form class="ui reply form mt-4" x-show="commentOpen">
        <div class="field">
            <textarea wire:model.lazy="comment_text"></textarea>
        </div>
        <button type="submit" class="ui blue labeled submit icon button"  wire:click.prevent="addComment">
            <i class="icon edit"></i>
            <svg wire:loading wire:target="addComment" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                      d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                </path>
            </svg>
            <span>Comment</span>
        </button>
    </form>
    <div class="ui comments"><!--comment section from semantic UI -->
        <h3 class="ui dividing header">Comments</h3>
        @foreach($experience->comments()->latest()->get() as $comment)
            <div class="comment divide-y divide-gray-200">
                <a class="avatar">
                    <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp" class="w-10 h-10 rounded-full">
                </a>
                <div class="content">
                    <a href="" class="author">{{$comment->user->name}}</a>
                    <div class="metadata">
                        <span class="date">{{$comment->created_at->diffForHumans()}}</span>
                    </div>
                    <div class="text">
                        <p>{{$comment->description}}</p>
                    </div>
                </div>
                <livewire:reply-to-comment :comment="$comment" :wire:key="$comment->id"/>
            </div>

        @endforeach
    </div>
</div>

