import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import ListMails from "./pages/Mails";
import Editor from "./pages/Editor";

const routes = [
    {
        path: "/mails",
        name: "mail.index",
        component: ListMails
    },
    {
        path: "/editor",
        name: "mail.editor",
        component: Editor
    }
];

const router = new VueRouter({
    routes,
    mode: "history"
});

export default router;
