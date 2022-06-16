<template>
    <div class="w-25 container">
        <div class="text-center mt-3" style="font-size: 200%">Register your account</div>
        <input v-model="name" type="text" class="form-control mt-3 mb-3" placeholder="name">
        <input v-model="email" type="email" class="form-control mb-3" placeholder="email">
        <input v-model="password" type="password" class="form-control mb-3" placeholder="password">
        <input v-model="password_confirm" type="password" class="form-control mb-3" placeholder="confirm password">
        <input @click.prevent="store" type="submit" class="btn btn-primary">
        <div v-if="error" class="text-danger mt-2 w-50">{{this.error}}</div>
    </div>
</template>

<script>
export default {
    name: "Registration",

    data() {
        return {
            name: null,
            email: null,
            password: null,
            password_confirm: null,
            error: null
        }
    },
    methods: {
        store() {
            axios.post('/api/users',
                {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    password_confirm: this.password_confirm
                })
                .then(res => {
                    localStorage.setItem('access_token', res.data.access_token)
                    this.$router.push({ name: 'post.index'})
                })
                .catch( error => {
                    this.error = error.response.data.error
                })
        }
    }
}
</script>

<style scoped>

</style>
