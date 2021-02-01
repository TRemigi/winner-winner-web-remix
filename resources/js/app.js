/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("axios");

require("./bootstrap");
window.Vue = require("vue").default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);

Vue.component("home-component", require("./components/Home.vue").default);

Vue.component(
    "giveaway-index",
    require("./components/GiveawayIndex.vue").default,
    {
        props: ["giveaways"]
    }
);

Vue.component(
    "giveaway-create",
    require("./components/GiveawayCreate.vue").default,
    {
        props: ["user"]
    }
);

Vue.component(
    "giveaway-edit",
    require("./components/GiveawayEdit.vue").default,
    {
        props: ["giveaway"]
    }
);

Vue.component(
    "giveaway-show",
    require("./components/GiveawayShow.vue").default,
    {
        props: ["giveaway", "participants"],
        data: {
            winnerChosen: "",
            isComplete: ""
        }
    }
);

Vue.component(
    "participant-create",
    require("./components/ParticipantCreate.vue").default,
    {
        props: ["giveaway"]
    }
);

Vue.component(
    "participant-edit",
    require("./components/ParticipantEdit.vue").default,
    {
        props: ["giveaway", "participant"]
    }
);

Vue.component(
    "participant-index",
    require("./components/ParticipantIndex.vue").default,
    {
        props: ["participants"]
    }
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app"
});
