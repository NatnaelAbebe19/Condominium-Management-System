import { createRouter, createWebHistory } from 'vue-router'
import LoginView from '@/views/LoginView.vue'
import RegisterView from '@/views/RegisterView.vue'
import ChooseRole from '@/views/ChooseRole.vue'
import { useAuthStore } from "@/stores/auth";
import RenterHome from '@/views/RenterHome.vue'
import AboutView from '@/views/AboutView.vue'
import ContactView from '@/views/ContactView.vue'
import RentalView from '@/views/RentalView.vue'
import RentPost from '@/views/RentPost.vue'
import AuthenticatedAbout from '@/views/AuthenticatedAbout.vue'
import WelcomeView from '../views/WelcomeView.vue'
import HomeView from '@/views/HomeView.vue'
import AuthContact from '@/views/AuthContact.vue';
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'welcome',
      component: WelcomeView,
      meta: { guest: true }
    },
    {
      path: '/home', 
      name: 'home', 
      component: HomeView, 
      meta: {auth: true}
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
      path: '/authabout',
      name: 'authabout',
      component: AuthenticatedAbout,
      meta: {auth: true}
    },
    {
      path: '/contact',
      name: 'contact',
      component: ContactView,
    },
    {
      path: '/authcontact',
      name: 'authcontact',
      component: AuthContact,
      meta: {auth: true}
    },
    {
      path: '/rentals',
      name: 'rentals',
      component: RentalView,
     
    },
    {
      path: '/rentPost',
      name: 'rentPost',
      component: RentPost,
 
    },

    {
      path: '/renterHome',
      name: 'renterHome',
      component: RenterHome,
      meta: { auth: true },
    }
  ],
});

router.beforeEach(async (to, from) => {

  const authStore = useAuthStore();
  await authStore.getUser();

  if (authStore.user?.role === "renter" && to.meta.auth && to.name !== "renterHome") {
    return { name: "renterHome" };
  }
  if(!authStore.user && to.meta.auth){
    return {name: "login"}
  }
  
});

export default router
