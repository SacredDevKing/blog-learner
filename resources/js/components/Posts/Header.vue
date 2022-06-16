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
                            <router-link v-if="!accessToken" :to="{name: 'user.register'}" class="btn btn-sm btn-outline-light text-white">Sign Up</router-link>
                            <router-link v-if="!accessToken" :to="{name: 'user.login'}" class="btn btn-sm btn-outline-light text-white">Login</router-link>
                            <a href="#" v-if="accessToken" @click.prevent="logout" class="btn btn-sm btn-outline-light text-white">Logout</a>
                        </div>
                    </div>
                </div>
            </header>
        </div>
</template>

<script>
import api from "../../api";

export default {
    name: "Header",

    data(){
        return{
            accessToken: null,
            role: null
        }
    },

    mounted() {
        this.getAccessToken()
        this.getUser()
    },

    // updated() {
    //     this.getAccessToken()
    // },

    methods: {
        getAccessToken() {
            this.accessToken = localStorage.getItem('access_token')
        },
        logout() {
            api.post('api/auth/logout')
                .then(res => {
                    localStorage.removeItem('access_token')
                    this.$router.push({name: 'user.login'})
                })
        },
        getUser(){
            api.get('api/auth/cabinet')
                .then( res => {
                    this.role = res.data.user.role
                })
        }
    }

}
</script>

<style scoped>

</style>
