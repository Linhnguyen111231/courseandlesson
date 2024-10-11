// import './bootstrap';
import { createApp } from 'vue';
import ExampleComponent from './components/ExampleComponent';

const app = createApp({});

app.component('examplecomponent', ExampleComponent);

app.mount('#app');
