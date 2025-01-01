import router from "@/router";
import { defineStore } from "pinia";

export const useAuthStore = defineStore("authStore", {
  state: () => {
    return {
      user: null,
      errors: {},
    };
  },
  // getters: {},
  actions: {
    /********************* Get Authenticated User  ********************** */

    async getUser() {
      if (localStorage.getItem("token")) {
        const res = await fetch("/api/user", {
            headers: {
                Authorization: `Bearer ${localStorage.getItem("token")}`,
                'Content-Type': 'application/json'
              },
        });
        const data = await res.json();
        if (res.ok) {
          this.user = data;
        }
      }
    },

    /**************** Login and Register  ***************/
    async authenticate(apiRoute, formData) {
      const res = await fetch(`/api/${apiRoute}`, {
        method: "post",
        headers: {
          // Authorization: `Bearer ${localStorage.getItem("token")}`,
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(formData),
      });

      const data = await res.json();
      if (data.errors) {
        this.errors = data.errors;
      } else {
        console.log(this.user);
        this.errors = {};
        localStorage.setItem("token", data.token);
        console.log("data", data.user.role);
        this.user = data.user;

        if (data.user.role === 'admin') {
          router.push({ name: 'adminHome' });
        } else if (data.user.role === 'renter') {
          router.push({ name: 'renterHome' });
        } else {
          router.push({ name: 'home' });
        }
      }
    },

    /**************** Logout  ***************/

    async logout() {
      const res = await fetch("/api/logout", {
        method: "post",
        headers: {
          authorization: `Bearer ${localStorage.getItem("token")}`,
        },
      });

      const data = await res.json();
      console.log(data);

      if (res.ok) {
        this.user = null;
        this.errors = {};
        localStorage.removeItem("token");
        router.push({ name: "welcome" });
      }
    },
  },
});