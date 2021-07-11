@extends('layouts.app')
@section('content')
    <div class="filters flex flex-col md:flex-row space-x-10">
        <div class="md:w-2/3">
            <?php
            $categories= array('Your-asked-questions','Your-likes','Other-involvements');
            ?>
            <form action="{{route('categoryMyInvolvement')}}" method="POST">
                {{ csrf_field() }}
                <select name="category" onchange="this.form.submit()" id="category" class="w-full text-sm rounded-xl px-3 py-2 border-none">
                    @if(isset($categoryChanged))
                        <option value="{{$categoryChanged}}">{{$categoryChanged}}</option>
                    @else
                        <?php $categoryChanged=null; ?>
                    @endif
                    @foreach($categories as $category)
                        @if($category != $categoryChanged)
                            <option value="{{$category}}">{{$category}}</option>
                        @endif
                    @endforeach
                </select>
            </form>
        </div>
    </div> <!--filters ends -->
@endsection
