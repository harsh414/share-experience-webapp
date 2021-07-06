<div>
    <div x-data="{addReplyOpen:false}"> <!--div for comment Alpine -->
        <div class="buttons-container flex items-center justify-between mt-6"><!--buttons container -->
            <div class="flex items-center space-x-4 ml-6">
                <button type="button" class="flex focus:outline-none items-center justify-center h-11 w-56 text-sm bg-blue text-white font-semibold rounded-xl
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
    </div>
</div>
