// import './bootstrap';
import { createApp } from 'vue';
import Model from './components/Model.vue';

const app = createApp({
    methods: {
        openModal() {
          this.$refs.modalRef.openModal(); // Gọi phương thức openModal() từ modal component
        }
      }
    
});

app.component('model', Model);

app.mount('#app2');
