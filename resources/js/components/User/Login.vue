<template>
    <div class="w-25 container">
        <div class="text-center mt-3" style="font-size: 200%">Login or register to see content</div>
        <input v-model="email" type="email" class="form-control mt-3 mb-3" placeholder="email">
        <input v-model="password" type="password" class="form-control mb-3" placeholder="password">
        <input @click.prevent="login" type="submit" class="btn btn-primary">
        <div v-if="error" class="text-danger mt-2">{{this.error}}</div>
    </div>
</template>

<script>

export default {
    name: "Login",
    data() {
        return {
            email: null,
            password: null,
            error: null
        }
    },

    methods: {
        login() {
            axios.post('/api/auth/login', {email: this.email, password: this.password})
                .then(res => {
                    localStorage.setItem('access_token', res.data.access_token)
                    this.$router.push({name: 'post.index'})
                })
                .catch( error => {
                    this.error = error.response.data.error
                })
        },
    }

}

</script>

<style scoped>

</style>
