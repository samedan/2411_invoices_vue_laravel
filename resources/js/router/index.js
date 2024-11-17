import { createRouter, createWebHistory } from "vue-router";
import invoiceIndex from "../components/invoices/index.vue";
import NotFound from "../components/NotFound.vue";
import invoiceNew from "../components/invoices/new.vue";
import invoiceShow from "../components/invoices/show.vue";
import invoiceEdit from "../components/invoices/edit.vue";

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
    {
        path: "/invoice/show/:id",
        component: invoiceShow,
        props: true,
    },
    {
        path: "/invoice/edit/:id",
        component: invoiceEdit,
        props: true,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
