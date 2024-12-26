import router from "@/router";
import { defineStore } from "pinia";

export const useRentalStore = defineStore("rentalStore", {
    state: () => {
        return {
            errors: {},
        };
    },
    actions: {

        async getAllRentals() {
            const res = await fetch(`/api/rentals`, {
              method: "GET",
              headers: {
                Authorization: `Bearer ${localStorage.getItem("token")}`,
                'Content-Type': 'application/json'
              },
            });
            const data = await res.json();
            console.log(data);
            return data;
          },

          async getRentalById(id) {
            try {
                const res = await fetch(`/api/rentals/${id}`, {
                    method: "GET",
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem("token")}`,
                        'Content-Type': 'application/json'
                    },
                });
                const data = await res.json();
                console.log(data);
                return data;
            } catch (error) {
                console.error("An error occurred while fetching the rental:", error);
                this.errors = { general: "An unexpected error occurred." };
            }
        },
        async createRental(formData) {
            try {
                const res = await fetch("/api/rentals", {
                    method: "POST",
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem("token")}`,
                           'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(formData),
                });

                const data = await res.json();
                console.log(data);

                if (data.errors) {
                    this.errors = data.errors;
                } else {
                    this.errors = {};
                    const rentalId = data.id; 
                    router.push({ name: 'uploadImages', query: { rental_id: rentalId } });
                return data;
                }
            } catch (error) {
                console.error("An error occurred while creating the rental:", error);
                this.errors = { general: "An unexpected error occurred." };
            }
        },
        async updateRental(id, formData) {
            try {
                const res = await fetch(`/api/rentals/${id}`, {
                    method: "PUT",
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem("token")}`,
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(formData),
                });

                const data = await res.json();
                console.log(data);

                if (data.errors) {
                    this.errors = data.errors;
                } else {
                    this.errors = {};
                    router.push({ name: 'rentalsView' });
                    return data;
                }
            } catch (error) {
                console.error("An error occurred while updating the rental:", error);
                this.errors = { general: "An unexpected error occurred." };
            }
        },
        async deleteImage(imageId) {
            try {
                const res = await fetch(`/api/rental_image/${imageId}`, {
                    method: "DELETE",
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem("token")}`,
                        'Content-Type': 'application/json'
                    },
                });

                const data = await res.json();
                console.log(data);

                if (data.errors) {
                    this.errors = data.errors;
                } else {
                    this.errors = {};
                    return data;
                }
            } catch (error) {
                console.error("An error occurred while deleting the image:", error);
                this.errors = { general: "An unexpected error occurred." };
            }
        },


        async uploadImages(formData){
            try {
                const res = await fetch("/api/rental_image", {
                    method: "POST",
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem("token")}`,
                        'Content-Type': 'multipart/form-data'
                    },
                    body: formData,
                });
                const data = await res.json();
                console.log(data);

                if (data.errors) {
                    this.errors = data.errors;
                } else {
                    this.errors = {};
                    const rentalId = data.id; 
                    router.push({ name: 'uploadImages', query: { rental_id: rentalId } });
                return data;
                }

            }catch(error){
                console.error(error);
            }
        }

    },
});