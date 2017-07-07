/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('flash', require('./components/Flash.vue'));
Vue.component('paginator', require('./components/Paginator.vue'));
Vue.component('company-view', require('./pages/Company.vue'));
Vue.component('profile-view', require('./pages/Profile.vue'));

Vue.component('users-view', require('./pages/admin/Users.vue'));

Vue.component('word-counter', require('./components/WordCounter.vue'));
const app = new Vue({
    el: '#app'
});
