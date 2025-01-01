import { createRouter, createWebHistory } from 'vue-router'
import LoginView from '@/views/Auth/LoginView.vue'
import RegisterView from '@/views/Auth/RegisterView.vue'
import ChooseRole from '@/views/ChooseRole.vue'
import { useAuthStore } from "@/stores/auth";
import RenterHome from '@/views/RenterHome.vue'
import AboutView from '@/views/AboutView.vue'
import ContactView from '@/views/ContactView.vue'
import RentalView from '@/views/Customer/RentalView.vue'
import RentPost from '@/views/RentPost.vue'
import AuthenticatedAbout from '@/views/AuthenticatedViews/AuthenticatedAbout.vue'
import WelcomeView from '../views/WelcomeView.vue'
import HomeView from '@/views/HomeView.vue'
import AuthContact from '@/views/AuthenticatedViews/AuthContact.vue';
import UploadImages from "@/views/UploadImages.vue";
import RenterRentalView from '@/views/Renter/RenterRentalView.vue';
import EditRentals from '@/views/Renter/EditRentals.vue';
import RentalDetail from '@/views/Customer/RentalDetail.vue';
import Notifications from '@/views/Renter/Notifications.vue';
import MyRents from '@/views/Customer/MyRents.vue';
import AdminHome from '@/views/Admin/AdminHome.vue';
import AdminUserList from '@/views/Admin/AdminUserList.vue';
import AdminRentalList from '@/views/Admin/AdminRentalList.vue';
import AdminDistributions from '@/views/Admin/AdminDistributions.vue';
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
    },
    {
      path: '/upload-images',
      name: 'uploadImages',
      component: UploadImages,
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
    },
    {
      path: '/editRentals/:id',
      name: 'editRentals', 
      component: EditRentals, 
      props: true
    },
    {
      path: '/showRental/:id',
      name: 'showRental', 
      component: RentalDetail, 
      props: true
    },
    {
      path: '/rentals',
      name: 'rentals',
      component: RentalView,
      meta: {auth: true}
    },
    {
      path: '/notifications',
      name: 'notifications', 
      component: Notifications,
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
    }, 
    {
      path: '/rentalsView', 
      name: 'rentalsView', 
      component: RenterRentalView 
    }, 
    {
      path: '/my-rents/:userId',
      name: 'myRent',
      component: MyRents,
      meta: { auth: true },
  }, 
  {
    path: '/admin',
    name: 'adminHome',
    component: AdminHome,
    meta: { admin: true },
  },
  {
    path: '/adminUserList', 
    name: 'adminUserList', 
    component: AdminUserList,
    meta: {admin: true}
  },
  {
    path: '/adminRentalList', 
    name: 'adminRentalList', 
    component: AdminRentalList,
    meta: {admin: true}
  }, 
  {
    path: '/adminDistributions',
    name: 'adminDistributions',
    component: AdminDistributions,
    meta: {admin: true}
  } 
  ],
});

router.beforeEach(async (to, from) => {

  const authStore = useAuthStore();
  await authStore.getUser();

  if(!authStore.user && to.meta.auth){
    return {name: "login"}
  }
  // if (authStore.user?.role === 'admin' && to.name !== 'adminHome') {
  //   return { name: 'adminHome' };
  // }
  // if (authStore.user?.role === "admin" && to.meta.auth) {
  //   return { name: "adminHome" };
  // }
  if (authStore.user?.role === "renter" && to.meta.auth && to.name !== "renterHome") {
    return { name: "renterHome" };
  }
  



});

export default router
