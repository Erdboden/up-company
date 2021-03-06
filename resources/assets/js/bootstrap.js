window._ = require('lodash');


try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap-sass');
} catch (e) {
}


window.Vue = require('vue');


// Vue.prototype.authorize = function (handler) {
//     // Additional admin privileges here.
//     let user = window.App.user;
//
//     return user ? handler(user) : false;
// };

window.axios = require('axios');


window.axios.defaults.headers.common = {
    'X-CSRF-TOKEN': window.App.csrfToken,
    'X-Requested-With': 'XMLHttpRequest'
};
// window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}


window.events = new Vue();

window.flash = function (message) {
    window.events.$emit('flash', message);
};
