<template>
        <div class="container">
            <section class="py-5 text-center container">
                <div class="row py-lg-5">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <h1 class="fw-light">Hey!</h1>
                        <p class="lead text-muted">This is beautiful blog</p>
                    </div>
                </div>
            </section>
            <div class="row" style="justify-content: center">
                <template v-for="grant in grants">
                    <div class="card mt-3 m-lg-1" style="width: 25%; background-color: transparent; border: 0px solid">
                        <router-link :to="{name: 'post.show', params: {id: grant.id}}">
                            <img :src="grant.image" class="card-img-top mt-2" alt="..." style="box-shadow: 0 0 10px 5px rgba(221, 221, 221, 1);">
                        </router-link>
                        <h5 class="text-start mt-2"><strong>{{ grant.title }}</strong></h5>
                        <small class="lead text-muted mb-3">{{grant.created_at}}</small>
                    </div>
                </template>
            </div>
        </div>
</template>

<script>

import API from "../../api";

export default {
    name: "Index",

    data(){
        return {
            grants: null,
        }
    },

    mounted() {
        this.getGrants()
    },

    methods: {
        getGrants(){
            API.get('/api/auth/grants')
                .then( res => {
                    this.grants = res.data.grants
                })
        },
    }


}
</script>

<style scoped>

</style>
