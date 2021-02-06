import Vue from 'vue';
import VueRouter from 'vue-router';
import Employee from './components/admin/Employee';
import Users from './components/admin/Users';
import Login from './components/Login';
import Device from './components/admin/Device';
import Dashboard from './components/admin/Dashboard';



Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [{
            path: '/Employee',
            name: 'Employee',
            component: Employee
        },
        {
            path: '/Device',
            path: '/Device',
            component: Device
        },
        {
            path: '/Dashboard',
            path: '/Dashboard',
            component: Dashboard
        },
        {
            path: '/Login',
            path: '/Login',
            component: Login
        },
        {
            path: '/Users',
            path: '/Users',
            component: Users
        },



    ],
});


export default router;