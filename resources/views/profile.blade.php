@extends('layouts.profile')
@section('content')
<div class="container max-w-custom mx-auto pt-36 sm:pt-36 md:pt-24 flex flex-col sm:flex-col md:flex-row">
    <form method="post" enctype="multipart/form-data" id="profile_form">
        {{@csrf_field()}}
        <div class="flex flex-col sm:flex-col md:flex-row justify-between items-center w-full">
            <div class="md:w-1/3">
                <div class="profile-img w-full">
                    <img id="profile_img" style="height:35rem;width: 20rem" class="px-8 md:px-0 md:w-full rounded-3xl shadow shadow-lg" src="{{auth()->user()->img_url}}">
                </div>
                <input type="file" name="file" id="file" class="mt-2 ml-2 hidden"
                       onchange="document.getElementById('profile_img').src = window.URL.createObjectURL(this.files[0])">
                <button onclick="document.getElementById('file').click()" type="button" class="bg-gray-300 hover:bg-gray-400 transition ease-in ease-linear border border-gray-400 mt-3 px-3 py-2 rounded-xl focus:outline-none">Change Photo</button>
            </div>
            <div class="md:w-2/3">
                <div class="pl-1 md:pl-24 mt-8 md:mt-0 text-3xl text-center font-bold tracking-wider text-gray-900">
                    <div class="flex items-center justify-start space-x-6">
                        <div>
                            <img src="https://res.cloudinary.com/dkerurdbc/image/upload/v1626028809/Free_Sample_By_Wix_2_vos1qi.jpg" class="h-40 w-40 rounded-full" alt="">
                        </div>
                        <span class="bg-gray-400 px-5 py-3 rounded-xl">Your Profile</span>
                    </div>
                </div>
                <div id="success" class="container ml-4 md:ml-10 mt-6 md:mt-12 hidden">
                    <span id="success_message" class="text-xl bg-gray-400 px-2 py-2 rounded-2xl text-center"></span>
                </div>
                <div class="container ml-4 md:ml-10 mt-6 md:mt-24 border border-gray-200 rounded-xl">
                    <span class="name font-semibold text-lg">Name:</span>
                    <span class="pl-4 text-lg">{{auth()->user()->name}}</span>
                </div>
                <div class="container bg-gray-700 text-white text-center px-2 py-1 ml-4 md:ml-10 mt-6 md:mt-24 border border-gray-200  text-xl font-semibold rounded-xl">
                    Add Work Experiences
                </div>
                <div class="container ml-4 md:ml-10 mt-6 md:mt-6 border border-gray-200 rounded-xl">
                    <input type="text" name="skill" value="{{auth()->user()->skills}}" id="skill" placeholder="Enter experience and press enter.." />
                </div>
                <input type="submit" id="submit" value="Update profile" class="cursor-pointer tracking-wider ml-4 mb-4 md:ml-24 mt-4 md:mt-12 bg-blue rounded-xl text-white px-5 py-3 hover:bg-blue-600">
            </div>
        </div>
    </form>
</div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#skill').tokenfield({
                autocomplete: {
                    source: [],
                    delay: 100
                },
                showAutocompleteOnFocus: true
            });

            $('#profile_form').on('submit', function (event) {
                event.preventDefault();
                let formData = new FormData(this);
                $('#submit').attr("disabled","disabled");
                $.ajax({
                    url:"{{route('my-profile-update')}}",
                    method:"POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend:function(){
                        $('#submit').val('Updating...');
                    },
                    success:function(data){
                        if(data)
                        {
                            $('#success_message').html(data.msg);
                            $("#success").removeClass('hidden');
                            $('#submit').attr("disabled", false);
                            $('#submit').val('Update Profile');
                            $("#profile_img").attr("href",data.image_url);
                        }
                    }
                });
                setInterval(function(){
                    $('#success_message').html('');
                    $("#success").addClass('hidden');
                }, 3000);
            });
        });
    </script>
@endsection
