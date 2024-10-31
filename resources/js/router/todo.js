const routes = [
    {
        path: "/",
        component: () => import("../components/MainPage.vue"),
        name: "MainPage",
    },
];

export default {
    routes,
};
