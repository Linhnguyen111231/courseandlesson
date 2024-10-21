@extends('home::layouts.master')

@extends('global.header')
@section('content')
    <div class="pt-10 px-10">
        <div class="grid grid-cols-4">
            <div class="col-span-3">
                <h1 class="px-3 text-[40px] font-bold mb-5">{{$lesson->title}}</h1>

                <div class="p-3">
                    <video controls class="w-full h-[320px]">
                        <source src="{{$lesson->video_url}}">
                    </video>
                    <div class=" flex-col mt-3">
                        {!!$lesson->description!!}

                    </div>
                </div>
            </div>
            <div class="col-span-1">
            
                <div class="mt-5">
                    <h1 class="text-[40px] font-bold">Bài học</h1>
                <ul class="">
                    @foreach($course->lessons as $lessonC)
                    @if ($lesson->slug == $lessonC->slug)
                    <li style="background-color: rgb(107 114 128);" class="shadow-md mt-2 rounded bg-gray-900 p-[10px] text-[14px] text-[#fff] font-bold">
                        <h3>{{$lessonC->title}}</h3>

                    </li>
                    @else
                        <li  class="shadow-md mt-2 rounded bg-gray-900 p-[10px] text-[14px] text-[#000] font-bold">
                            <a href="{{route('learning.show', $course->slug)}}?lesson={{$lessonC->slug}}">
                                <h3>{{$lessonC->title}}</h3>
                            </a>

                        </li>
                        
                    @endif
                    @endforeach
                  </ul>
                </div>
            </div>
            
        </div>
    </div>
@endsection
