import { createRouter, createWebHistory } from 'vue-router';
import Login from '../components/Login.vue';
import Register from '../components/Register.vue';
import Greeting from '../components/Greeting.vue';

const routes = [
  { path: '/', redirect: '/login' },
  { path: '/login', name: 'Login', component: Login },
  { path: '/register', name: 'Register', component: Register },
  { path: '/greeting', name: 'Greeting', component: Greeting, props: true }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
