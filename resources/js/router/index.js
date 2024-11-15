import { createRouter, createWebHistory } from "vue-router";
import invoiceIndex from "../components/invoices/index.vue";
import NotFound from "../components/NotFound.vue";
import invoiceNew from "../components/invoices/new.vue";

const routes = [
    {
        path: "/",
        component: invoiceIndex,
    },
    {
        path: "/:pathMatch(.*)*",
        component: NotFound,
    },
    {
        path: "/invoice/new",
        component: invoiceNew,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
