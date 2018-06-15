import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from '../pages/Home.vue';
import ListEmployees from '../pages/ListEmployees.vue';

Vue.use(VueRouter);

const routes = [
    {
        path: '/',
        name: 'home',
        component: Home,
    },
    {
        path: '/list/employees',
        name: 'list.employees',
        component: ListEmployees,
    },
];

export default new VueRouter({
    routes,
    mode: 'history',
    saveScrollPosition: false,
});