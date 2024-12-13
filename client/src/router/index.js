import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import LoginView from '@/views/LoginView.vue'
import RegisterView from '@/views/RegisterView.vue'
import ChooseRole from '@/views/ChooseRole.vue'
import { useAuthStore } from "@/stores/auth";
import RenterHome from '@/views/RenterHome.vue'
import AboutView from '@/views/AboutView.vue'
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
      meta: { user: true }
    },
    {
      path: '/login',
      name: 'login',
      component: LoginView,
    },
    {
      path: '/register',
      name: 'register',
      component: RegisterView,
    },
    {
      path: '/about',
      name: 'about',
      component: AboutView,
    },
    {
      path: '/renterHome',
      name: 'renterHome',
      component: RenterHome,
      meta: { auth: true },
    },
  ],
});

router.beforeEach(async (to, from) => {

  const authStore = useAuthStore();
  await authStore.getUser();

  if (authStore.user?.role === "renter" && to.meta.user) {
    return { name: "renterHome" };
  } 

});

export default router
