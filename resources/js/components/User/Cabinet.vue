<template>
    <div>
        <div class="d-flex justify-content-center mt-4" style="font-size: 200%">
            <p>This is your cabinet!</p>
        </div>
        <div class="d-flex justify-content-center mt-1">
            <img src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png" alt=""
                 width="300" height="250">
        </div>
        <div class="d-flex justify-content-center mt-2">
            <h2 class="fw-normal" style="font-size: 300%">Your name: {{name}}</h2>
        </div>
        <div class="d-flex justify-content-center mt-2">
            <h2 class="fw-normal" style="font-size: 300%">Your email: {{email}}</h2>
        </div>
    </div>
</template>

<script>
import api from "../../api";

export default {
    name: "Cabinet",
    data() {
        return {
            email:null,
            name:null
        }
    },

    mounted() {
        this.getUser()
    },

    updated() {
        this.getUser()
    },

    methods: {
        getUser() {
            this.name = localStorage.getItem('name')
            this.email = localStorage.getItem('email')
        }
    }

}

</script>

<style scoped>

</style>
