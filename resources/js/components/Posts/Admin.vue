<template>
    <div class="w-25 container">
        <div class="text-center mt-3" style="font-size: 200%">Create Post</div>
        <input v-model="title" type="text" class="form-control mt-3 mb-3" placeholder="title">
        <input v-model="short_content" type="text" class="form-control mt-3 mb-3" placeholder="short_content">
        <input v-model="content" type="text" class="form-control mt-3 mb-3" placeholder="content">
        <input v-model="image" type="text" class="form-control mt-3 mb-3" placeholder="image">
        <input @click.prevent="storeGrant" type="submit" class="btn btn-primary">
    </div>
</template>

<script>

import API from "../../api";
import router from "../../router";

export default {
    name: "Admin",

    data(){
        return {
            title: null,
            short_content: null,
            content: null,
            image: null,
        }
    },

    methods: {
        storeGrant() {
            API.post('/api/auth/admin/grants', { title: this.title, short_content: this.short_content, content: this.content, image: this.image})
                .then(res => {
                    router.push({name: 'post.index'})
                })
        },
    }


}
</script>

<style scoped>

</style>
