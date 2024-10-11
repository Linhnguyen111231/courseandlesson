// import './bootstrap';
import { createApp } from 'vue';
import Lesson from './assets/Lesson.vue';

const app = createApp({});

app.component('lesson', Lesson);

app.mount('#lesson');
