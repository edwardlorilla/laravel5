/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the body of the page. From here, you may begin adding components to
 * the application, or feel free to tweak this setup for your needs.
 */

var Vue = require('vue')
var VueRouter = require('vue-router');


Vue.http.headers.common['X-CSRF-TOKEN'] = Laravel.csrfToken;
Vue.use(VueRouter);

import Auth from './components/packages/auth/Auth.js'

Vue.use(Auth);
Vue.http.headers.common['Authorization'] = 'Bearer ' + Vue.auth.getToken()

import VeeValidate from 'vee-validate';
Vue.use(VeeValidate);

import Event from './components/Event.vue';
import Example from './components/Example.vue';
import About from './components/About.vue';
import Users from './components/Users.vue';
import UsersTest from './components/UsersTest.vue';


Vue.filter('uppercase', function(value) {
    return value.toUpperCase();
});


// Filter for cutting off strings that are too long.
Vue.filter('truncate', function(value) {
    var length = 60;

    if(value.length <= length) {
        return value;
    }
    else {
        return value.substring(0, length) + '...';
    }
});
const router = new VueRouter({
    hashbang: false,
    base: __dirname,
    linkActiveClass: 'active',
    routes: [
        { path: '/', component:  Event , name: 'event', meta:{forVisitors:true}},
        { path: '/about', component:  About , name: 'about', meta:{forAuth:true} },
        { path: '/users', component:  Users , name: 'users', meta:{forVisitors:true} },
        { path: '/userstest', component:  UsersTest , name: 'usersTest', meta:{forVisitors:true} },
    ]
})

router.beforeEach(
    (to,from,next) => {
         if (to.matched.some(record => record.meta.forVisitors)){
            if(Vue.auth.isAuthenticated()){
                next({
                    name: 'about'
                })
            }else next()
         }
         else if (to.matched.some(record => record.meta.forAuth)){
             if(! Vue.auth.isAuthenticated()){
                 next({
                     name: 'event'
                 })
             }else next()
         }
         else  next()
    }
)

new Vue(Vue.util.extend({router}, Example)).$mount('#app')
