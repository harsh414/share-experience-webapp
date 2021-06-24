<div class="bg-white border-2 border-blue rounded-xl mt-16"
     style="border-image-source: linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
                            border-image-slice: 1;background-image: linear-gradient(to bottom, #ffffff, #ffffff), linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
                            background-origin: border-box;background-clip: content-box, border-box;">
    <div class="text-center px-6 py-2 pt-6">
        <h3 class="font-semibold text-base">Add Experience</h3>
        <p class="text-xs mt-4">Share your experiences with others ! Help them grow </p>
        <form action="#" method="POST" class="px-3 py-6">
            <div>
                <select name="category_add" id="category_add" class="w-full bg-gray-100 text-sm rounded-xl border-none px-4 py-2">
                    <option value="Interview Experience">Interview Experience</option>
                    <option value="Internship Experience">Internship Experience</option>
                </select>
            </div>
            <div>
                <input type="text" name="company_name" id="company_name" class="bg-white text-sm border-none w-full text-sm rounded mt-4 placeholder-gray-500" placeholder="Company Name" >
            </div>
            <div class="mt-4">
                <textarea name="experience" id="experience" cols="30" rows="16" class="w-full bg-gray-100 rounded-xl border-none placeholder-gray-900 text-sm px-4 py-2" placeholder="Share your experience :)"></textarea>
            </div>
            <div class="flex items-center justify-between space-x-3 mt-2">
                <button type="button" class="flex focus:outline-none items-center justify-center w-1/2 h-9 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
                    <svg class="text-gray-600 w-4 transform -rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                    </svg>
                    <span class="ml-1">Attach</span>
                </button>
                <button type="submit" class="flex items-center justify-center w-1/2 h-9 text-xs bg-blue text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">
                    <span class="ml-1">Submit</span>
                </button>
            </div>
        </form>
    </div>
</div>
