<template>
    <div>
        <div class="d-flex justify-content-center">
            <div class="card mt-3 m-lg-1 justify-content-center" style="width: 37%; background-color: transparent; border: 0px solid; font-family: Bahnschrift, sans-serif;">
                <small class="lead text-muted mt-3">{{ grant.created_at }}</small>
                <h5 class="text-start" style="font-size: 250%"><strong>{{ grant.title }}</strong></h5>
                <h5 class="text-start" style="font-size: 115%; ">{{ grant.short_content }}</h5>
                <img :src="grant.image" class="card-img-top mt-2" alt="..."
                     style="box-shadow: 0 0 10px 5px rgba(221, 221, 221, 1);">
                <h5 class="text-start mt-3">{{ grant.content }}</h5>
            </div>
        </div>
    </div>
</template>


<script>

import API from "../../api";

export default {
    name: "Show",

    data(){
        return {
            grant: null
        }
    },

    mounted() {
        this.getGrant()
    },

    methods: {
        getGrant(){
            API.get(`/api/auth/grants/${this.$route.params.id}`)
                .then( res => {
                    this.grant = res.data.grant
                })
        },
    }

}
</script>

<style scoped>

</style>
