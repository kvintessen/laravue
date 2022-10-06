import {fetchArticlesData} from "../../api/articles/getArticles";

export default {
    namespaced: true,

    state: {
        slug:       null,
        is_loaded:  false,
        id:         null,
        title:      null,
        img:        null,
        body:       null,
        created_at: null,
        comments:   null,
        tags:       null,
        statistic:  null,
    },
    mutations: {
        SET_IS_LOADED(state) {
            state.is_loaded = true
        },
        SET_SLUG(state) {
            let url = window.location.pathname
            state.slug = url.substring(url.lastIndexOf('/')+1)
        },
        SET_ID(state, id) {
            state.id = id
        },
        SET_TITLE(state, title) {
            state.title = title
        },
        SET_IMG(state, img) {
            state.img = img
        },
        SET_BODY(state, body) {
            state.body = body
        },
        SET_CREATED_AT(state, created_at) {
            state.created_at = created_at
        },
        SET_COMMENTS(state, comments) {
            state.comments = comments()
        },
        SET_TAGS(state, tags) {
            state.tags = tags
        },
        SET_STATISTIC(state, statistic) {
            state.statistic = statistic
        },
    },
    actions: {
        async fetchData({commit, state}) {
            commit('SET_SLUG')
            const response = await fetchArticlesData(state.slug)
            console.log(response)
        }
    }
}
