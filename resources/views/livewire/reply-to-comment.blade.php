<div x-data="{replyOpen:false}">
    <button class="actions focus:outline-none"  @click="replyOpen=!replyOpen">
        <a class="reply">Reply</a>
    </button>
    <form class="ui reply form mt-4" x-show="replyOpen">
        <div class="field">
            <textarea rows="4" wire:model="reply_text"></textarea>
        </div>
        <button type="submit" class="ui blue labeled submit icon button" wire:click.prevent="addReply" @click="replyOpen=false">
            <i class="icon edit"></i>
            <svg wire:loading wire:target="addReply" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                      d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                </path>
            </svg>
            <span>Reply</span>
        </button>
    </form>
    <div class="comments"><!--all replies of current comment  -->
        @foreach($comment->replies()->latest()->get() as $reply)
            <div class="comment">
                <a class="avatar">
                    <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp" class="w-10 h-10 rounded-full">
                </a>
                <div class="content">
                    <a class="author">Jenny Hess</a>
                    <div class="metadata">
                        <span class="date">Just now</span>
                    </div>
                    <div class="text">
                        {{$reply->description}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
