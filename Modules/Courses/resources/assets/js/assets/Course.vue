<script setup>
import Editor from '@tinymce/tinymce-vue'
</script>
<template>
    <main>
        <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
            <section class=" dark:bg-gray-900">
                <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
                    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">{{ websiteName }}</h2>
                    <form action="#">
                        <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                            <div class="sm:col-span-2">
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Course
                                    Name</label>
                                <input type="text" name="name" id="name" v-model="courseName"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Type product name" required="">
                            </div>
                            <div class="w-full">
                                <label for="price"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                <input type="number" name="price" id="price"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    v-model="coursePrice" placeholder="$299" required="">
                            </div>
                            <div class="w-full">
                                <label for="price"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tags</label>
                                <input type="text" name="tags" id="tags"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    v-model="courseTags" placeholder="Ex: #Linh, #Thanh" required="">
                            </div>
                            <div class="sm:col-span-2">
                                <label for="skill"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Skill</label>
                                <select id="skill" multiple v-model="courseSkills"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option v-for="skill in skills" :key="skill.id" :value="skill.id">{{
                                        skill.skill_name }}</option>

                                </select>
                            </div>
                            <div>
                                <label for="status"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                <select id="status" v-model="courseStatus"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="yes" selected>Yes</option>
                                    <option value="no">No</option>

                                </select>
                            </div>
                            <div>
                                <label for="item-weight"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Thời gian học
                                    dự kiến
                                </label>
                                <input type="number" name="item-weight" id="item-weight"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    v-model="courseDuration" placeholder="Ex. 12" required="">
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
                                }" initial-value="Enter Course Description..." v-model="courseDescription" />
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
                                <video style="height: 300px; width: 100%;" v-show="isVideo" controls>
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
export default {
    props: {
        websiteName: {
            type: String,
        },
        pageName: {
            type: String
        },
        skills: {
            type: Array
        }
    },
    data() {
        return {
            isActive: false,
            isImage: false,
            isVideo: false,
            videoSrc: '',
            videoID: '',
            courseName: '',
            courseDescription: '',
            coursePrice: '',
            courseDuration: '',
            courseImage: null,
            courseVideo: null,
            courseSkills: [],
            courseTags: '',
            courseStatus: '',
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
        handleImageUpload(event) {
            const file = event.target.files[0];
            if (file) {
                this.courseImage = file;
                this.isImage = true;
                this.imagePreview = URL.createObjectURL(file);
            }

        },
        handleVideoUpload(event) {
            console.log(1);
            console.log(event.target);

            const file = event.target.files[0];

            if (file) {
                this.courseVideo = file;
                this.isVideo = true;
                this.videoPreview = URL.createObjectURL(file);
                console.log(this.videoPreview);
                this.$nextTick(() => {
                    const videoElement = document.querySelector("video");
                    videoElement.load(); // Gọi lại phương thức load sau khi URL blob thay đổi
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
        handleCreateOrUpdate() {
            const videoURLOrFile = this.isActive ? this.videoSrc : this.courseVideo
            const data = new FormData();
            data.append('title', this.courseName);
            data.append('tags', this.courseTags);
            data.append('price', this.coursePrice);
            data.append('status', this.courseStatus);
            data.append('skills', this.courseSkills);
            data.append('duration', this.courseDuration),
                data.append('description', this.courseDescription);
            data.append('image', this.courseImage);
            data.append('video', videoURLOrFile);

            // data.append('')

            // console.log(this.courseSkills[0]);

            // if (this.pageName == 'Create') {
            Swal.fire({
                title: 'Loading...',
                text: 'Please wait while we create the course.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading(); // Hiển thị hiệu ứng loading
                }
            });

            axios.post(`${process.env.MIX_APP_URL}/api/create/course`, data)
                .then(response => {
                    // Sau khi thành công, tắt loading và hiển thị thông báo thành công
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
            // }
        }
    }
}
</script>
