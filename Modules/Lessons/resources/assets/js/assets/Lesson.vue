<script setup>
import Editor from '@tinymce/tinymce-vue'
</script>
<template>
    <main @click="handleClickOutside">
        <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <section class=" dark:bg-gray-900">
                <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
                    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">{{ websiteName }}</h2>
                    <form action="#">
                        <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                            <div class="sm:col-span-2">
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lesson
                                    Name</label>
                                <input type="text" name="name" id="name" v-model="lessonName"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Type product name" required="">
                            </div>
                            <div class="sm:col-span-2">

                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Course</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                    </div>
                                    <input type="search" v-model="searchCourse" @input="handleInput"
                                        @focus="isForcus = true" id="default-search"
                                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Search Courses..." required />
                                    <button @click.prevent="handleBtnSearch" :disabled="isLoading"
                                        class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><span v-if="isLoading" class="loader"></span>
                                        <span v-else>Search</span></button>
                                    <div v-show="isForcus" class="absolute arrow-up"
                                        style="left: 0;right: 0; top: 65px;">
                                        <ul @click.stop ref="searchBox"
                                            class='w-full absolute border border-gray-500 rounded z-[9] bg-[#fff] max-h-[150px] no-scrollbar'
                                            style="overflow-y: auto;">
                                            <li v-show="isLoading" class="loading absolute inset ">Loading...</li>
                                            <li v-for="course in resultsCourse" :data-id="course.id" @click="handleChooseCourse"
                                             :key="course.id"   class="course cursor-pointer text-bold hover:bg-[#8edcff] border-gray-300 border px-[15px] py-[6px]">
                                                {{ course.title }}</li>
                                            

                                        </ul>
                                    </div>
                                </div>

                            </div>

                            <div class="sm:col-span-2">
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                <Editor api-key="keon88rq4pjicg8ov4rubimb6mwx9meovh9506j4k5t9imbr" :init="{
                                    toolbar_mode: 'sliding',
                                    plugins: [
                                        'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',

                                        'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown',
                                    ],
                                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                                    tinycomments_mode: 'embedded',
                                    tinycomments_author: 'Author name',
                                    mergetags_list: [
                                        { value: 'First.Name', title: 'First Name' },
                                        { value: 'Email', title: 'Email' },
                                    ],
                                    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
                                }" initial-value="Enter Lesson Description..." v-model="lessonDescription" />
                            </div>
                            <div class="sm:col-span-2">
                                <label for="checkYTB" @change="checkYTB">

                                    <input type="checkbox" name="" id="checkYTB"> Link Youtube
                                </label>
                                <input type="text" v-model="videoID" v-if="isActive" name="name" id="urlYTB"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    value="Apple iMac 27“" placeholder="Enter ID Video Youtube..." required="">
                                <button @click.prevent="handleVideo" v-if="isActive"
                                    class="btn mt-3 bg-sky-500 rounded text-white py-[10px] px-[14px]">Chọn</button>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2 mb-5">

                            <div class="flex items-center justify-center w-full">
                                <label for="dropzone-file"
                                    class="flex flex-col items-center justify-center w-full h-[8rem] border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6 w-full">
                                        <svg v-show="!isImage" class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                        </svg>
                                        <p v-show="!isImage" class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p v-show="!isImage" class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG,
                                            JPG </p>
                                        <img style="height: 125px;width: 100%;" v-show="isImage" :src="imagePreview"
                                            alt="">
                                    </div>
                                    <input id="dropzone-file" @change="handleImageUpload" type="file" class="hidden" />
                                </label>
                            </div>

                            <div class="flex items-center justify-center w-full">
                                <label for="dropzone-video"
                                    class="flex flex-col items-center justify-center w-full h-[8rem] border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">Video</p>

                                    </div>
                                    <input :disabled="isActive" @change="handleVideoUpload" id="dropzone-video"
                                        type="file" class="hidden" />
                                </label>

                            </div>
                            <div class="sm:col-span-2">
                                <iframe width="100%" height="315px" v-bind:src="videoSrc" v-if="isActive" id="videdoYTB"
                                    v-show="videoSrc" title="YouTube video player" frameborder="0"
                                    class=" flex flex-col items-center justify-center w-full h-[8rem] border-2 border-gray-300  rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                                <video style="height: 300px; width: 100%;" v-show="isVideo"  @loadedmetadata="onVideoMetadataLoaded" controls>
                                    <source :src="videoPreview" type="video/mp4" />
                                </video>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <button @click.prevent="handleCreateOrUpdate"
                                class="border-sky-500 border-solid bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                {{ websiteName }}
                            </button>
                            <button type="button"
                                class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                <svg class="w-5 h-5 mr-1 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Delete
                            </button>
                        </div>
                    </form>
                </div>
            </section>

        </div>
    </main>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2'
import _ from 'lodash';
export default {
    props: {
        websiteName: {
            type: String,
        },
        pageName: {
            type: String
        }
    },
    data() {
        return {
            isActive: false,
            isForcus: false,
            isImage: false,
            isVideo: false,
            isLoading: false,
            videoSrc: '',
            videoID: '',
            lessonName: '',
            lessonDescription: '',
            lessonImage: null,
            lessonDuration:'',
            resultsCourse: null,
            lessonVideo: null,
            lessonCourse: null,
            imagePreview: null,
            videoPreview: null,
            content: '<p>Nhập nội dung tại đây...</p>',
            tinymceInit: {
                height: 500,
                menubar: false,
                plugins: 'lists link image table',
                toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright | bullist numlist outdent indent | link image'
            }
        }
    },
    mounted() {
    },
    methods: {
        // async getSkills(){
        //     axios.get(`${process.env.MIX_APP_URL}/create/course`)
        //     .then(response=>{
        //         this.skills = response.data;
        //         console.log(response.data);

        //     })
        // },
        handleInput: _.debounce(function () {
            this.isForcus = true;

            this.search();
        }, 500),
        search() {
            if (this.searchCourse.length > 0) {
                this.isLoading= true;
                console.log('Đang tìm kiếm:', this.searchCourse);
                const data = new FormData()
                data.append('search', this.searchCourse);
                axios.post(`${process.env.MIX_APP_URL}/api/search/courses`, data)
                .then(response=>{
                    this.isLoading = false
                    this.resultsCourse = response.data.courses;
                })
                .catch(error => {
                    console.log(error);
                    this.isLoading = false

                })
                    
            } else {
                this.resultsCourse = [];
            }
        },
        handleBtnSearch(event) {
            this.isForcus = true;
            this.search()
        },
        handleChooseCourse(event){
            this.lessonCourse = event.target.dataset.id;
            this.searchCourse = event.target.textContent;
            this.isForcus = false;
            
            
        },
        handleImageUpload(event) {
            const file = event.target.files[0];
            if (file) {
                this.lessonImage = file;
                this.isImage = true;
                this.imagePreview = URL.createObjectURL(file);
            }

        },
        formatTime(totalSeconds){
            let hours = Math.floor(totalSeconds / 3600);
            let minutes = Math.floor((totalSeconds % 3600) / 60);
            let seconds = Math.floor(totalSeconds % 60);
            let formattedSeconds = String(seconds).padStart(2, '0');

                return `${String(hours).padStart(2, '0')}:${String(minutes).padStart(2, '0')}:${formattedSeconds}`;
            
        },
        onVideoMetadataLoaded(event){
            const videoDuration = event.target.duration

            const duration = this.formatTime(videoDuration);
            this.lessonDuration = duration;
            
        },
        handleClickOutside(event) {
            const searchBox = this.$refs.searchBox;
            if (!searchBox.contains(event.target)) {
                this.isForcus = false;
            }
        },
        handleVideoUpload(event) {

            const file = event.target.files[0];

            if (file) {
                this.lessonVideo = file;
                this.isVideo = true;
                this.videoPreview = URL.createObjectURL(file);
                this.$nextTick(() => {
                    const videoElement = document.querySelector("video");
                    videoElement.load(); 

                });

            }
        },

        checkYTB(event) {
            this.isActive = !this.isActive;
            if (!this.isActive) {
                this.videoSrc = '';
            }

        },
        handleVideo() {
            if (this.videoID) {
                this.isVideo = false
                this.videoSrc = `https://www.youtube.com/embed/${this.videoID}`;
            }
        },
        closeBox() {
            this.isForcus = false
        },
        handleCreateOrUpdate() {
            const videoURLOrFile = this.isActive ? this.videoSrc : this.lessonVideo
            const data = new FormData();
            data.append('title', this.lessonName);
            data.append('description', this.lessonDescription);
            data.append('image', this.lessonImage);
            data.append('video', videoURLOrFile);
            data.append('course_id', this.lessonCourse)
            this.lessonDuration != '' ? data.append('duration', this.lessonDuration): ''
            console.log(this.lessonName, this.lessonCourse, this.lessonDescription, this.lessonImage, videoURLOrFile);
            
            // data.append('')

            // console.log(this.courseSkills[0]);

            if (this.pageName == 'Create') {
            Swal.fire({
                title: 'Loading...',
                text: 'Please wait while we create the course.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading(); // Hiển thị hiệu ứng loading
                }
            });

            axios.post(`${process.env.MIX_APP_URL}/api/create/lesson`, data)
                .then(response => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'The course was created successfully!',
                        confirmButtonText: 'OK'
                    });
                    console.log(response.data);
                })
                .catch(error => {
                    // Nếu có lỗi, tắt loading và hiển thị thông báo lỗi
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'There was an error creating the course. Please try again later.',
                        confirmButtonText: 'OK'
                    });
                    console.log(error);
                });
            }
        }
    }
}
</script>
<style scoped>
/* Tạo mũi tên viền đen */
.arrow-up::before {
    content: '';
    position: absolute;
    top: -10px;
    /* Vị trí mũi tên viền đen */
    left: 10%;
    transform: translateX(-50%);
    border-left: 10px solid transparent;
    border-right: 10px solid transparent;
    border-bottom: 10px solid #000;
    /* Màu đen bên ngoài */
    z-index: 9;
}

/* Tạo mũi tên nhỏ màu trắng bên trong */
.arrow-up::after {
    content: '';
    position: absolute;
    top: -8px;
    /* Vị trí mũi tên màu trắng */
    left: 10%;
    transform: translateX(-50%);
    border-left: 8px solid transparent;
    border-right: 8px solid transparent;
    border-bottom: 10px solid #fff;
    /* Màu trắng bên trong */
    z-index: 10;
}
.loader {
  border: 3px solid #f3f3f3; /* Màu nền của loader */
  border-top: 3px solid #3498db; /* Màu xoay */
  border-radius: 50%;
  width: 15px;
  height: 15px;
  animation: spin 1s linear infinite;
  display: inline-block;
  vertical-align: middle;
}
.loading{
    position: absolute;
    inset: 0;
    background-color: rgba(0, 0, 0, 0.6);
    display: flex;
    color: #fff;
    justify-content: center;
    align-items: center;
}
@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>