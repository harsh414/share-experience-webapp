<div class="bg-white border-2 border-blue rounded-xl mt-16"
     style="border-image-source: linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
                            border-image-slice: 1;background-image: linear-gradient(to bottom, #ffffff, #ffffff), linear-gradient(to bottom, rgba(50, 138, 241, 0.22), rgba(99, 123, 255, 0));
                            background-origin: border-box;background-clip: content-box, border-box;">
    <div class="text-center px-6 py-2 pt-6">
        <h3 class="font-semibold text-base">Ask From community</h3>
        <p class="text-xs mt-4">Ask for a review or an experience before joining at a place :)</p>
        <form action="#" method="POST" class="px-3 py-6">
            <div>
                <select name="category_add" id="category_add" class="w-full bg-gray-100 text-sm rounded-xl border-none px-4 py-2">
                    <option value="Interview-Experience">Interview-Experience</option>
                    <option value="Internship-Experience">Internship-Experience</option>
                </select>
            </div>
            <div>
                <input type="text" name="company_name_question" id="company_name_question" class="bg-white text-sm border-none w-full text-sm rounded mt-4 placeholder-gray-500" placeholder="Company Name" >
            </div>
            <div class="mt-4">
                <textarea name="question" id="question" cols="30" rows="16" class="w-full bg-gray-100 rounded-xl border-none placeholder-gray-900 text-sm px-4 py-2" placeholder="Share your experience :)"></textarea>
            </div>
            <div class="space-x-3 mt-2">
                <button type="submit" class="flex items-center justify-center w-1/2 h-9 text-xs bg-blue text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">
                    <span class="ml-1">Submit</span>
                </button>
            </div>
        </form>
    </div>
</div>
