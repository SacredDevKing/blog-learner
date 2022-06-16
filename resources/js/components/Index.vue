<template>
    <div>
        <header class="bg-primary text-white">
            <div class="container">
                <div class="row flex-nowrap justify-content-between align-items-center">
                    <div class="col-4 pt-1">
                        <a class="link-secondary text-white" href="#" style="text-decoration: none;">Subscribe</a>
                    </div>
                    <div class="col-4 text-center">
                        <router-link :to="{name: 'post.index'}" class="blog-header-logo text-white fs-1">Blog</router-link>
                    </div>
                    <div class="col-4 d-flex justify-content-end align-items-center">
                        <a class="link-secondary" href="#" aria-label="Search">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3 text-white" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"></circle><path d="M21 21l-5.2-5.2"></path></svg>
                        </a>
                        <router-link v-if="!accessToken" :to="{name: 'user.login'}" class="btn btn-sm btn-outline-light m-1">Login</router-link>
                        <router-link v-if="!accessToken" :to="{name: 'user.register'}" class="btn btn-sm btn-outline-light">Sign Up</router-link>
                        <router-link v-if="accessToken" :to="{name: 'user.cabinet'}" class="btn btn-sm btn-outline-light m-1">MyCabinet</router-link>
                        <router-link v-if="accessToken && role === 'admin'" :to="{name: 'post.admin'}" class="btn btn-sm btn-outline-light m-1">Admin</router-link>
                        <a href="#" v-if="accessToken" @click.prevent="logout" class="btn btn-sm btn-outline-light m-1">Logout</a>
                    </div>
                </div>
            </div>
        </header>

        <router-view></router-view>
    </div>
</template>

<script>
import api from "../api";

export default {
    name: "Index",

    data(){
        return{
            accessToken: null,
            role: null,
        }
    },

    mounted() {
        this.getAccessToken()
        this.getRole()
    },

    updated() {
        this.getAccessToken()
        this.getRole()
    },

    methods: {
        getAccessToken() {
            this.accessToken = localStorage.getItem('access_token')
        },
        logout() {
            api.post('api/auth/logout')
                .then(res => {
                    localStorage.removeItem('access_token')
                    localStorage.removeItem('role')
                    this.$router.push({name: 'user.login'})
                })
        },
        getRole(){
            api.get('api/auth/cabinet')
                .then( res => {
                    if (res.data.user !== undefined){
                         localStorage.setItem('role', res.data.user.role)
                         localStorage.setItem('email', res.data.user.email)
                         localStorage.setItem('name', res.data.user.name)
                        this.role = localStorage.getItem('role')
                    }
                })
        }
    }
}
</script>

<style scoped>

</style>
