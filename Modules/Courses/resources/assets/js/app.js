// import './bootstrap';
import { createApp } from 'vue';
import Course from './assets/Course.vue';

const app = createApp({});

app.component('course', Course);

app.mount('#course');
