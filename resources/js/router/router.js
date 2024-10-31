import { createRouter } from "vue-router";
import { createWebHistory } from "vue-router";
// import routes from "./todo";
const routes = [
    {
        path: "/",
        component: () => import("../components/MainPage.vue"),
        name: "MainPage",
    },
];
const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    linkActiveClass: "active",
    routes,
});
export default {
    router,
};
