import router from "../../router";
import API from "../../api";

const state = {
    grant: {
        grants: null,
        grant: null,
        title: null,
        image: null,
        created_at: null,
    },
    grants: null,
}

const getters = {
    grant: () => state.grant,
    grants: () => state.grants,
}

const mutations = {
    setGrant(state, grant) {
        state.grant = grant
    },
    setGrants(state, grants) {
        state.grants = grants
    }

}

const actions = {
    getGrant({commit, dispatch, state}, id){
        API.get(`/api/auth/grants/${id}`)
            .then( res => {
                commit('setGrant', res.data.grant)
                console.log(res.data.grant);
            })
    },
    getGrants({commit}){
        API.get('/api/auth/grants')
            .then( res => {
                commit('setGrants', res.data.grants)
            })
    },
    deleteGrant({dispatch},id){
        API.delete(`/api/people/${id}`)
            .then( res => {
                dispatch('getGrants')
            })
    },
    updateGrant({}, data) {
        API.patch(`/api/people/${data.id}`, {name: data.name, age: data.age, job: data.job})
            .then( res => {
                router.push({name: 'post.show', params: {id: data.id}})
            })
    },
    storeGrant({}, data) {
        API.post('/api/people', { name: data.name, age: data.age, job: data.job})
            .then(res => {
                router.push({name: 'posts.index'})
            })
    },
}

export default {
    state, mutations, getters, actions
}
