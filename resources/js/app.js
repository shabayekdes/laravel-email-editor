import router from "./router";
import MarkdownIt from "markdown-it";

require("./bootstrap");

window.Vue = require("vue");

window.md = new MarkdownIt({
    linkify: true
});

const app = new Vue({
    el: "#app",
    router
});
