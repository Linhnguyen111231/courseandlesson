@extends('home::layouts.master')

@extends('global.header')
@section('content')
    <div class="pt-10 px-10">
        <div class="grid grid-cols-4">
            <div class="col-span-3">
                <div class="p-3">
                    <video controls class="w-full h-[320px]">
                        <source src="{{$course->video_url}}">
                    </video>
                    <div class=" flex-col mt-3">
                        {!!$course->description!!}

                        <div class="mt-2">Tổng giờ học: {{$course->duration}}</div>

                    </div>
                </div>
            </div>
            <div class="col-span-1">
                <h1 class="text-[40px] font-bold mb-5">{{$course->title}}</h1>
           
                   {!!$course->description!!}
            
                <div class="mt-5">
                    <h1 class="text-[40px] font-bold">Bài học</h1>
                <ul class="w-3/4">
                    @foreach($course->lessons as $lesson)
                    <li style="background-color: rgb(107 114 128);" class="mt-2 rounded bg-gray-900 p-[10px] text-[14px] text-[#fff] font-bold">{{$lesson->title}}</li>
                    @endforeach
                  </ul>
                </div>
            </div>
            
        </div>
    </div>
@endsection
