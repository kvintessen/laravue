import Vuex from 'vuex'


export default new Vuex.Store({
    state: {
        firstname: 'Ivan',
        lastname: 'Ivanov'
    },

    actions: {
        testAction(context, payload) {
            context.commit('SET_FIRSTNAME', responce.data.name)
            context.commit('SET_LASTNAME', responce.data.lastname)
        }
    },
    getters: {
        getFullName(state) {
            return state.firstname + ' ' + state.lastname
        }
    },

    mutations: {
        SET_FIRSTNAME(state, payload) {
            state.firstname = payload
        },

        SET_LASTNAME(state, payload) {
            state.lastname = payload
        }
    }
})
