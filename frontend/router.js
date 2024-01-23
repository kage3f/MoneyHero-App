import { createRouter, createWebHistory } from 'vue-router';
import Dashboard from './Views/Dashboard.vue';
import Cobrancas from './Views/Cobrancas.vue';
import Relatorios from './Views/Relatorio.vue';
import Saque from './Views/Saque.vue';

const routes = [
  { path: '/', redirect: '/dashboard' },
  { path: '/dashboard', component: Dashboard }, // Adicione esta linha
  { path: '/cobrancas', component: Cobrancas },
  { path: '/relatorio', component: Relatorios },
  { path: '/saque', component: Saque },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
