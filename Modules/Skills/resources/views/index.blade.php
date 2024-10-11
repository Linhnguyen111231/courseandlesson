@extends('courses::layouts.master')

@section('content')
    <div id="app2">
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
                            <button @click="openModal()" data-modal-target="default-modal"
                                data-modal-toggle="default-modal"
                                class="float-right bg-green-700 p-[20px] text-bold rounded"><i
                                    class="fa-solid fa-plus"></i></button>

                        </div>
                        <div>
                            <model ref="modalRef" />

                        </div>
                        @include('partials.table-manager',['values'=>$skills, 'table'=>$table, 'page'=>'skills'])
                    </div>
                </main>
            </div>
        </div>
    </div>
    <script src="{{ mix('js/assets/skills/app.js') }}"></script>
@endsection
