@extends('home::layouts.master')

@extends('global.header')
@section('content')
    <div class="px-[20px] py-[20px] " >

        <div class="slider flex justify-center">
            <div class="relative w-full overflow-hidden">
                <!-- Mũi tên trái -->
                <button id="prevBtn" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-200 p-2 rounded-full">
                  &larr;
                </button>
               
                <!-- Container chứa các thẻ -->
                <div id="slider" class="flex transition-transform duration-500">
                  <!-- Thẻ 1 -->
                  <div class="min-w-full">
                    <div class="background-image-gradient rounded-xl">
                      <p>Nội dung hiển thị trên nền ảnh và gradient</p>
                      <img src="https://files.fullstack.edu.vn/f8-prod/banners/Banner_01_2.png" alt="">
                    </div>
                  </div>
                  <!-- Thẻ 2 -->
                  <div class="min-w-full">
                    <div class="background-image-gradient rounded-xl">
                      <p>Nội dung hiển thị trên nền ảnh và 1</p>
                      <img src="https://files.fullstack.edu.vn/f8-prod/banners/Banner_01_2.png" alt="">
                    </div>
                  </div>
                  <!-- Thẻ 3 -->
                  <div class="min-w-full">
                    <div class="background-image-gradient rounded-xl">
                      <p>Nội dung hiển thị trên nền ảnh và 2</p>
                      <img src="https://files.fullstack.edu.vn/f8-prod/banners/Banner_01_2.png" alt="">
                    </div>
                  </div>
                </div>
              
                <!-- Mũi tên phải -->
                <button id="nextBtn" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-200 p-2 rounded-full">
                  &rarr;
                </button>
                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
                    <button class="indicator w-3 h-3 rounded-full bg-white"></button>
                    <button class="indicator w-3 h-3 rounded-full bg-white"></button>
                    <button class="indicator w-3 h-3 rounded-full bg-white"></button>
                    <button class="indicator w-3 h-3 rounded-full bg-white"></button>
                  </div>
              </div>
        </div>
    </div>
    <div class="border-gray-500 border-b-2 mx-[20px]" style="line-height: normal">
        <h1 class="space-x-2 text-[24px] font-bold tracking-wider">Khóa Học</h1>
    </div>
    <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-3">
      @foreach ($courses as $course)
        <div class="col-span-1 rounded-lg shadow-md  mx-[10px]">
                   
          <a href="{{route('course.show', $course->slug)}}" class="  ">
              <img style="height: 170px; width: 100%; object-fit: cover" src="{{$course->image_url}}" alt="">
              <div class="body-content p-3">
                  <h3 class="text-[18px] medium-bold tracking-wider">{{$course->title}}</h3>
                  <h4 class="mt-2 text-[14px]">Price: <span>{{{$course->price}}}</span></h4>
                  <div class="induct mt-[6px] flex justify-between">
                      <span class=" text-bold text-[12px]">{{$course->tags}}</span>
                      <span class="text-[12px]"><i class="fa-regular fa-clock"></i> {{$course->duration}}</span>
                  </div>
              </div>
          </a>
        </div>
        @endforeach
        
    </div>
    <style>
        .background-image-gradient {
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  font-size: 24px;
  text-align: center;
  position: relative;
  
  /* Gradient chiếm 2/3 chiều ngang, ảnh chiếm 1/3 */
  background-image: 
  linear-gradient(to right, rgb(40, 119, 250), rgb(103, 23, 205));
    
  background-size: 100% 100%; /* Ảnh và gradient bao phủ toàn bộ phần tử */
  background-position: right; /* Ảnh được đặt ở góc phải */
  background-repeat: no-repeat;
}
    </style>

<script>
    const slider = document.getElementById('slider');
    const slides = document.querySelectorAll('#slider > div');
    const nextBtn = document.getElementById('nextBtn');
    const prevBtn = document.getElementById('prevBtn');
    const indicators = document.querySelectorAll('.indicator');
    let currentIndex = 0;
  
    function updateSlider() {
      slider.style.transform = `translateX(-${currentIndex * 100}%)`;
      indicators.forEach((btn, index) => {
        btn.classList.toggle('bg-gray-400', index === currentIndex);
        btn.classList.toggle('bg-white', index !== currentIndex);
      });
    }
  
    nextBtn.addEventListener('click', () => {
      currentIndex = (currentIndex + 1) % slides.length;
      updateSlider();
    });
  
    prevBtn.addEventListener('click', () => {
      currentIndex = (currentIndex - 1 + slides.length) % slides.length;
      updateSlider();
    });
  
    indicators.forEach((btn, index) => {
      btn.addEventListener('click', () => {
        currentIndex = index;
        updateSlider();
      });
    });
  
    // Initialize slider
    updateSlider();
  </script>
@endsection
