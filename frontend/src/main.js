import { createApp } from 'vue';
import App from './App.vue';
import router from './../router.js'; // Importe seu arquivo de rotas
import './style.css';
import VueApexCharts from 'vue-apexcharts';

const app = createApp(App);

// Utilize o router
app.use(router);
app.component('apexchart', VueApexCharts);
app.mount('#app');

