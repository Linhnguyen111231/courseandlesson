@extends('courses::layouts.master')

@section('content')
    
<div class="flex h-screen overflow-hidden">
    <!-- ===== Sidebar Start ===== -->
    @include('partials.sidebar')

    <!-- ===== Sidebar End ===== -->

    <!-- ===== Content Area Start ===== -->
    <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
        <!-- ===== Header Start ===== -->
        @include('partials.header')
        <main>
            <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
                
                    <div class="deleteAll mb-[10px]">
                      <button class="bg-red-700 px-[20px] py-[14px] text-bold rounded">Delete All Checked</button>
                      <a href="{{route('courses.create')}}" class="float-right bg-green-700 p-[20px] text-bold rounded"><i class="fa-solid fa-plus"></i></a>
                    
                    </div>
               
                <table class="table-auto w-full text-left mt-5" style="text-align: left">
                    <thead>
                      <tr>
                        <th>Check</th>
                        <th>STT</th>
                        <th>Image</th>
                        <th>Content</th>
                        <th>Year</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td>1</td>
                        <td>The Sliding Mr. Bones (Next Stop, Pottersville)</td>
                        <td>Malcolm Lockyer</td>
                        <td>1961</td>
                        <td><button class="px-[5px] py-[10px] rounded">X</button></td>
                      </tr>
                      <tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td>Witchy Woman</td>
                        <td>2</td>
                        <td>The Eagles</td>
                        <td>1972</td>
                      </tr>
                      <tr>
                        <td><input type="checkbox" name="" id=""></td>
                        <td>Shining Star</td>
                        <td>Shining Star</td>
                        <td>Earth, Wind, and Fire</td>
                        <td>1975</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </main>
    </div>
</div>
@endsection
