import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import ListTemplates from "./pages/Templates";
import EditTemplate from "./pages/EditTemplate";
import CreateTemplate from "./pages/CreateTemplate";
import ComposeEmail from "./pages/ComposeEmail";

const routes = [
    {
        path: "/app/templates",
        name: "template.index",
        component: ListTemplates
    },
    {
        path: "/app/template/create",
        name: "template.create",
        component: CreateTemplate
    },
    {
        path: "/app/template/:id/edit",
        name: "template.edit",
        component: EditTemplate
    },
    {
        path: "/app/mail/compose",
        name: "mail.compose",
        component: ComposeEmail
    }
];

const router = new VueRouter({
    routes,
    mode: "history"
});

export default router;
