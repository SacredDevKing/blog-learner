import Vue from 'vue'
import VueRouter from "vue-router";
import Header from "./components/Posts/Header";

Vue.use(VueRouter)

const route = new VueRouter({
    mode: 'history',

    routes: [
        {
            path: '/posts', component: () => import('./components/Posts/Index'),
            name: 'post.index'
        },
        {
            path: '/posts/:id', component: () => import('./components/Posts/Show'),
            name: 'post.show'
        },
        {
            path: '/user/register', component: () => import ('./components/User/Registration'),
            name: 'user.register'
        },
        {
            path: '/user/login', component: () => import ('./components/User/Login'),
            name: 'user.login'
        },
        {
            path: '/user/cabinet', component: () => import ('./components/User/Cabinet'),
            name: 'user.cabinet'
        },
        {
            path: '/posts/admin', component: () => import ('./components/Posts/Admin'),
            name: 'post.admin'
        },
    ],
})

route.beforeEach((to, from, next) => {

    const accessToken = localStorage.getItem('access_token')

    const role = localStorage.getItem('role')

    if(!accessToken){
        if (to.name === 'user.login' || to.name === 'user.register'){
            return next()
        } else {
            return next({
                name: 'user.login'
            })
        }
    }

    if (to.name === 'user.login' || to.name === 'user.register' && accessToken) {
        return next({
            name: 'post.index'
        })
    }

    console.log(role);

    next()
})

export default route


