const routes = [
    {
        path: "/",
        component: () => import("../components/MainPage.vue"),
        name: "MainHeatbase",
    },
];

export default {
    routes,
};
